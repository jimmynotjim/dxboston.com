<?php
/*
  Template Name: Schedule
 */

  /**
   * Find correct timestamps from date param
   */
  function get_stamps( $query ) {
    if ( !isset( $query ) ) { return; }

    $query = explode( '_', $query);
    $day    = $query[0];
    $month  = $query[1];

    $stamps = array(
      'start' => mktime( 0, 0, 0, $day, $month, 2014) ,
      'end'   => mktime( 23, 59, 59, $day, $month, 2014 )
    );

    return $stamps;
  }

  /**
   * Check if filter is selected
   */
  if ( !function_exists( 'is_selected' ) ) {
    function is_selected( $type, $value, $params ) {
      $query = ( isset( $params ) ) ? $params : $_GET;

      if ( $query[$type] == $value ) {
        echo 'selected';
      }
    }
  }

  $query          = $_GET;
  $query['date']  = ( isset( $query['date'] ) ) ? $query['date'] : '9_27';
  $date_stamps    = get_stamps( $query['date'] );
?>

<?php get_header(); ?>

<div class="container">
  <main role="main" class="site-content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <article class="page-article">

        <header class="page-header no-image">
          <h1 class="page-title"><?php the_title(); ?></h1>
        </header>

        <form class="schedule-filters" action="<?php echo WWW_URL; ?>/2014-schedule/">
          <h3 class="filters-heading">Filter by: </h3>
          <ul class="filters-list">
            <li class="filter-option">
              <label>Day</label>
              <select name="date">
                <?php /*<option value="9_26" <?php is_selected( 'date', '9_26', $query ); ?>>Friday</option>*/ ?>
                <option value="9_27" <?php is_selected( 'date', '9_27', $query ); ?>>Saturday</option>
                <option value="9_28" <?php is_selected( 'date', '9_28', $query ); ?>>Sunday</option>
              </select>
            </li>
            <li class="filter-option">
              <label>Track</label>
              <select name="track">
                <option value="">All Tracks</option>
                <option value="the-lab" <?php is_selected( 'track', 'the-lab', $query ); ?>>The Lab</option>
                <option value="the-stage" <?php is_selected( 'track', 'the-stage', $query ); ?>>The Stage</option>
                <option value="the-field" <?php is_selected( 'track', 'the-field', $query ); ?>>The Field</option>
              </select>
            </li>
            <li class="filter-option">
              <label>Format</label>
              <select name="format">
                <option value="">All Formats</option>
                <option value="panel" <?php is_selected( 'format', 'panel', $query ); ?>>Panel</option>
                <option value="exhibit" <?php is_selected( 'format', 'exhibit', $query ); ?>>Exhibit</option>
                <option value="performance" <?php is_selected( 'format', 'performance', $query ); ?>>Performance</option>
                <option value="lightning" <?php is_selected( 'format', 'lightning', $query ); ?>>Lightning</option>
                <option value="workshop" <?php is_selected( 'format', 'workshop', $query ); ?>>Workshop</option>
                <option value="keynote" <?php is_selected( 'format', 'keynote', $query ); ?>>Keynote</option>
                <option value="registration" <?php is_selected( 'format', 'registration', $query ); ?>>Registration</option>
                <option value="breakfast" <?php is_selected( 'format', 'breakfast', $query ); ?>>Breakfast</option>
                <option value="coffee" <?php is_selected( 'format', 'coffee', $query ); ?>>Coffee</option>
              </select>
            </li>
          </ul>
          <button class="submit-filters">Submit</button>
        </form>

        <h2 class="schedule-date"><?php echo date( 'm.d l', $date_stamps['start'] ); ?></h2>

        <ul class="landing-list landing-list--schedule">
          <?php
            $paged      = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $meta_query = array(
              array(
                'key'     => '_cmb_session_start_timestamp',
                'value'   => $date_stamps['start'],
                'compare' => '>'
              ),
              array(
                'key'     =>  '_cmb_session_end_timestamp',
                'value'   => $date_stamps['end'],
                'compare' => '<'
              )
            );

            if ( isset( $_GET['format'] ) && $_GET['format'] !== '' ) {
              $meta_query[] = array(
                'key'     => '_cmb_session_format',
                'value'   => $_GET['format']
              );
            }

            if ( isset( $_GET['track'] ) && $_GET['track'] !== '' ) {
              $meta_query[] = array(
                'key'     => '_cmb_session_track',
                'value'   => $_GET['track']
              );
            }

            $session_args  = array(
              'paged'           => $paged,
              'post_type'       => 'sessions',
              'order'           => 'ASC',
              'orderby'         => 'meta_value',
              'posts_per_page'  => -1,
              'meta_key'        => '_cmb_session_start_timestamp',
              'meta_query'      => $meta_query
            );

            $session_query = new WP_Query( $session_args );

            if ( $session_query->have_posts() ) : while ( $session_query->have_posts() ) : $session_query->the_post();

            $post_meta  = get_post_meta( $post->ID );
            $start_date = $post_meta['_cmb_session_start_timestamp'][0];
            $end_date   = $post_meta['_cmb_session_end_timestamp'][0];
            $year       = date( 'Y', $start_date );
            if ( isset( $post_meta['_cmb_session_format'] ) ) {
              $format_name = $post_meta['_cmb_session_format'][0];
              $format_slug = str_replace(' ', '-', strtolower( $format_name ) );
            }
            if ( isset( $post_meta['_cmb_session_track'] ) ) {
              $track_name = $post_meta['_cmb_session_track'][0];
              $track_slug = str_replace(' ', '-', strtolower( $track_name ) );
            }
          ?>
          <li class="landing-item landing-item--schedule">

            <aside class="landing-item__schedule-details">
              <p class="session-date"><span><?php echo date( 'g:i a', $start_date ); ?></span><span> - </span><span><?php echo date( 'g:i a' ,$end_date ); ?></span></p>
            </aside>

            <header class="landing-item__schedule-header">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <?php //the_excerpt(); ?>
              <?php
                $speaker_args = array(
                  'connected_type'  => 'multiple_speakers',
                  'connected_items' => $post,
                  'nopaging'        => true,
                );
                $speaker_query = new WP_Query( $speaker_args );
              ?>
              <ul class="landing-item__schedule-speakers">
                <?php
                  if ( $speaker_query->have_posts() ) while ( $speaker_query->have_posts() ) : $speaker_query->the_post();

                  $profile_meta = get_post_meta( $post->ID );
                ?>
                <li>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php if ( isset( $profile_meta['_cmb_role_position'] ) ) : ?><span><?php echo $profile_meta['_cmb_role_position'][0]; ?></span><?php endif; ?>
                </li>
                <?php
                  endwhile;
                  wp_reset_postdata();
                ?>
              </ul>

            </header>

            <ul class="landing-item__schedule-icons session-icons">
              <li class="session-icon session-icon--format" style="background-image: url('<?php echo CHILD_SS_URI; ?>/assets/img/formats/<?php echo $format_slug; ?>.png');"><?php echo $format_name; ?></li>
              <li class="session-icon session-icon--track" style="background-image: url('<?php echo CHILD_SS_URI; ?>/assets/img/tracks/<?php echo $track_slug; ?>.png');"><?php echo $track_name; ?></li>
            </ul>

          </li>
          <?php endwhile; ?>
          <?php else: ?>
            <li class="schedule-no-results">No Results</li>
          <?php endif; ?>

        </ul>

        <?php if ( function_exists( 'pagination' ) ) {
          pagination( $session_query, $paged, null, 2 );
        } ?>

        <?php wp_reset_postdata(); ?>

      </article>

    <?php endwhile; ?>

  </main>
</div>

<?php get_footer(); ?>
