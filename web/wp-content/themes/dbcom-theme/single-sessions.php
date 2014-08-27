<?php get_header(); ?>

<div class="container">
  <main role="main" class="site-content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <?php
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

        $term_array = array();
        $terms      = get_the_terms( $post->ID, 'session-type' );

        if ( $terms ) :

          foreach( $terms as $term ) {
            $terms_array[] = $term->name;
          }

          $session_type = $terms_array[0];

        endif;
      ?>
      <article class="post-article">
        <div class="session-top">
          <header class="post-header no-image year-<?php echo $year; ?>">
            <?php if ( $year == 2013 && isset( $session_type ) ) : ?>
              <p class="post-type"><?php echo $session_type; ?></p>
            <?php endif; ?>
            <h1 class="post-title"><?php the_title(); ?></h1>
          </header>
          <?php if ( $year >= 2014 ) : ?>
            <aside class="session-details">
              <ul class="session-icons">
                <li class="session-icon session-icon--format" style="background-image: url('<?php echo CHILD_SS_URI; ?>/assets/img/formats/<?php echo $format_slug; ?>.png');"><?php echo $format_name; ?></li>
                <li class="session-icon session-icon--track" style="background-image: url('<?php echo CHILD_SS_URI; ?>/assets/img/tracks/<?php echo $track_slug; ?>.png');"><?php echo $track_name; ?></li>
              </ul>
              <?php if ( isset( $post_meta['_cmb_session_location'] ) ) : ?><p class="session-location"><?php echo ucwords( str_replace( '-', ' ', $post_meta['_cmb_session_location'][0] ) ); ?></p><?php endif; ?>
              <p class="session-date"><?php echo date( 'l', $start_date ); ?><br/><?php echo date( 'g:i a', $start_date ); ?>-<?php echo date( 'g:i a' ,$end_date ); ?></p>
            </aside>
          <?php endif; ?>
        </div>
        <?php the_content(); ?>

        <?php
          $speaker_args = array(
            'connected_type'  => 'multiple_speakers',
            'connected_items' => get_queried_object(),
            'nopaging'        => true,
          );
          $speaker_query = new WP_Query( $speaker_args );

          if ( $speaker_query->have_posts() ) :
        ?>
        <aside class="speaker-details">
          <h2>Presented By</h2>

          <ul class="profile-list profile-list--session">
            <?php
              while ( $speaker_query->have_posts() ) : $speaker_query->the_post();

              $profile_meta = get_post_meta( $post->ID );
            ?>
            <li class="profile-item profile-item--session">
              <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                  <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'profile-thumb' ); ?>" class="profile-image profile-image--thumb" />
                <?php else : ?>
                  <img src="<?php echo DEFAULT_THUMB; ?>" class="profile-image profile-image--thumb" />
                <?php endif; ?>
                <h3><?php the_title(); ?></h3>
                <?php if ( isset( $profile_meta['_cmb_role_position'] ) ) : ?><p><?php echo $profile_meta['_cmb_role_position'][0]; ?></p><?php endif; ?>
              </a>
            </li>
            <?php endwhile; ?>
          </ul>
        </aside>
        <?php
          endif;
          wp_reset_postdata();
        ?>

      </article>

      <?php if ( comments_open() || '0' != get_comments_number() ) : ?>

        <?php comments_template(); ?>

      <?php endif; ?>

    <?php endwhile; ?>

    <?php get_sidebar(); ?>

  </main>
</div>

<?php get_footer(); ?>
