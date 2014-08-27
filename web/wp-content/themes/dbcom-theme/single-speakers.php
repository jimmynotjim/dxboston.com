<?php get_header(); ?>

<div class="container">
  <main role="main" class="site-content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <?php
        $terms_array    = array();
        $terms          = get_the_terms( $post->ID, 'speaker-type' );

        foreach( $terms as $term ) {
          $terms_array[] = $term;
        }

        $section = $terms_array[0]->name;

        $profile_meta = get_post_meta( $post->ID );
      ?>

      <article class="post-article post-article--<?php echo str_replace(' ', '-', strtolower( $section ) ); ?>">
        <div class="profile-top">
          <header class="post-header post-header--profile">
            <?php if ( has_post_thumbnail() ) : ?>
            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'profile-full' ); ?>" class="profile-image profile-image--full" />
            <?php else : ?>
            <img src="<?php echo DEFAULT_PHOTO; ?>" class="profile-image profile-image--full" />
            <?php endif; ?>
            <h1 class="post-title post-title--profile"><?php the_title(); ?></h1>
            <?php if ( isset( $profile_meta['_cmb_organization_name'][0] ) && isset( $profile_meta['_cmb_role_position'] ) ) : ?>
            <p class="profile-org-role"><?php echo $profile_meta['_cmb_organization_name'][0]; ?>, <?php echo $profile_meta['_cmb_role_position'][0]; ?></p>
            <?php elseif ( isset( $profile_meta['_cmb_organization_name'][0] ) ) : ?>
            <p class="profile-org-role"><?php echo $profile_meta['_cmb_organization_name'][0]; ?></p>
            <?php elseif ( isset( $profile_meta['_cmb_role_position'] ) ) : ?>
            <p class="profile-org-role"><?php echo $profile_meta['_cmb_role_position'][0]; ?></p>
            <?php endif; ?>
          </header>

          <?php
            if ( $section == 'Speaker' ) :
            $session_args = array(
              'connected_type'  => 'multiple_speakers',
              'connected_items' => get_queried_object(),
              'nopaging'        => true,
            );
            $session_query = new WP_Query( $session_args );

            if ( $session_query->have_posts() ) :
          ?>
          <aside class="speaker-sessions">
            <h2 class="speaker-sessions__heading">Session(s)</h2>

            <ul class="speaker-sessions__list">
              <?php
                while ( $session_query->have_posts() ) : $session_query->the_post();

                $post_meta  = get_post_meta( $post->ID );
                $start_date = $post_meta['_cmb_session_start_timestamp'][0];
                $end_date   = $post_meta['_cmb_session_end_timestamp'][0];
                $year       = date( 'Y', $start_date );
              ?>
              <li>
                <a href="<?php the_permalink(); ?>">
                  <h3><?php the_title(); ?></h3>
                  <?php if ( $year == '2014' ) : ?>
                  <p class="session-date"><?php echo date( 'l', $start_date ); ?><br/><?php echo date( 'g:i a', $start_date ); ?>-<?php echo date( 'g:i a' ,$end_date ); ?></p>
                  <?php endif; ?>
                </a>
              </li>
              <?php
                endwhile;
                wp_reset_postdata();
              ?>
            </ul>
          </aside>
          <?php
            endif;
          endif;
          ?>

        </div>

        <?php the_content(); ?>

        <?php include_once( CHILD_SS_DIR . '/modules/profile-connections.php' ); ?>

      </article>

      <?php if ( $section == 'Speaker' ) : ?>
      <nav class="speaker-pagination">
        <h2>Browse Other Speakers</h2>
        <?php
          $prev_speaker = get_previous_post();
          $next_speaker = get_next_post();
        ?>
        <div class="prev">
          <?php if ( !empty( $prev_speaker ) ) : ?>
            <a href="<?php echo get_permalink( $prev_speaker->ID ); ?>">
              <?php if ( has_post_thumbnail( $prev_speaker->ID ) ) : ?>
                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $prev_speaker->ID ), 'profile-thumb' ); ?>" class="profile-image profile-image--thumb" />
              <?php else : ?>
                <img src="<?php echo DEFAULT_THUMB; ?>" class="profile-image profile-image--thumb" />
              <?php endif; ?>
              <h3><?php echo $prev_speaker->post_title; ?></h3>
            </a>
          <?php endif; ?>
        </div>
        <div class="next">
          <?php if ( !empty( $next_speaker ) ) : ?>
            <a href="<?php echo get_permalink( $next_speaker->ID ); ?>">
              <?php if ( has_post_thumbnail( $next_speaker->ID ) ) : ?>
                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $next_speaker->ID ), 'profile-thumb' ); ?>" class="profile-image profile-image--thumb" />
              <?php else : ?>
                <img src="<?php echo DEFAULT_THUMB; ?>" class="profile-image profile-image--thumb" />
              <?php endif; ?>
              <h3><?php echo $next_speaker->post_title; ?></h3>
            </a>
          <?php endif; ?>
        </div>
      </nav>
      <?php endif; ?>

    <?php endwhile; ?>

    <?php get_sidebar(); ?>

  </main>
</div>

<?php get_footer(); ?>
