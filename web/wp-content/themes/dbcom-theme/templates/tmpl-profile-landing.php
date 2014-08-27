<?php
/*
  Template Name: Profile Landing
 */
?>

<?php get_header(); ?>

<div class="container">
  <main role="main" class="site-content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <article class="page-article">

        <?php if ( has_post_thumbnail() ) : ?>
        <header class="page-header has-image">
          <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'post-hero' ); ?>" class="post-hero" />
          <h1 class="page-title"><?php the_title(); ?></h1>
        </header>
        <?php else : ?>
        <header class="page-header no-image">
          <h1 class="page-title"><?php the_title(); ?></h1>
        </header>
        <?php endif; ?>

        <?php the_content(); ?>

        <?php
          $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
          $profile_args = array();

          if ( is_page( 'past-speakers' ) ) :

            $profile_args = array(
              'paged'           => $paged,
              'post_type'       => 'speakers',
              'orderby'         => 'title',
              'order'           => 'ASC',
              'speaker-type'    => 'speaker',
              'posts_per_page'  => 30,
              'meta_query'  => array(
                array(
                  'key'     => '_cmb_event_year',
                  'value'   => 2013
                )
              )
            );

          elseif ( is_page( '2014-speakers' ) ) :

             $profile_args = array(
              'paged'           => $paged,
              'post_type'       => 'speakers',
              'orderby'         => 'title',
              'order'           => 'ASC',
              'speaker-type'    => 'speaker',
              'posts_per_page'  => 30,
              'meta_query'  => array(
                array(
                  'key'     => '_cmb_event_year',
                  'value'   => 2014
                )
              )
            );

          elseif ( is_page( 'volunteers' ) ) :

            $profile_args = array(
              'paged'           => $paged,
              'post_type'       => 'team',
              'orderby'         => 'title',
              'order'           => 'ASC',
              'team-type'       => 'organizers',
              'posts_per_page'  => 30,
              'meta_query'  => array(
                array(
                  'key'     => '_cmb_event_year',
                  'value'   => 2014
                )
              )
            );

          elseif ( is_page( 'dxb360-winners' ) ) :

            $profile_args = array(
              'paged'           => $paged,
              'post_type'       => 'speakers',
              'orderby'         => 'title',
              'order'           => 'ASC',
              'speaker-type'    => 'dxb360-winner',
              'posts_per_page'  => 30,
            );

          elseif ( is_page( 'fellows' ) ) :

            $profile_args = array(
              'paged'           => $paged,
              'post_type'       => 'speakers',
              'orderby'         => 'title',
              'order'           => 'ASC',
              'speaker-type'    => 'student-fellow',
              'posts_per_page'  => 30,
            );

          endif;

          $profile_query = new WP_Query( $profile_args );
        ?>

        <ul class="landing-list landing-list--profiles">
        <?php
          if ( $profile_query->have_posts() ) while ( $profile_query->have_posts() ) : $profile_query->the_post();

          $profile_meta = get_post_meta( $post->ID );
          ?>
          <li class="landing-item landing-item--profiles">
            <a href="<?php the_permalink(); ?>">
              <?php if ( has_post_thumbnail() ) : ?>
                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'profile-thumb' ); ?>" class="profile-image profile-image--thumb" />
              <?php else : ?>
                <img src="<?php echo DEFAULT_THUMB; ?>" class="profile-image profile-image--thumb" />
              <?php endif; ?>
              <h2><?php the_title(); ?></h2>
              <?php if ( isset( $profile_meta['_cmb_role_position'] ) ) : ?><p><?php echo $profile_meta['_cmb_role_position'][0]; ?></p><?php endif; ?>
            </a>
          </li>
          <?php
            endwhile;
          ?>
        </ul>

        <?php
          if ( function_exists('pagination') ) :
            pagination( $profile_query, $paged, null, 2 );
          endif;

          wp_reset_postdata();
        ?>

        <?php if ( is_page( 'volunteers' ) ) : ?>
          <h2>Join the team</h2>
          <?php include( CHILD_SS_DIR . '/modules/volunteer-signup.php' ); ?>
        <?php endif; ?>

      </article>

    <?php endwhile; ?>

    <?php get_sidebar(); ?>

  </main>
</div>

<?php get_footer(); ?>
