<?php get_header(); ?>

<div class="container">
  <main role="main" class="site-content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <?php $profile_meta = get_post_meta( $post->ID ); ?>


      <article class="post-article">
        <header class="post-header">
          <?php if ( has_post_thumbnail() ) : ?>
          <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'profile-full' ); ?>" class="profile-image profile-image--full" />
          <?php else : ?>
          <img src="<?php echo DEFAULT_PHOTO; ?>" class="profile-image profile-image--full" />
          <?php endif; ?>
          <h1 class="post-title post-title--profile"><?php the_title(); ?></h1>
          <?php if ( isset( $profile_meta['_cmb_role_position'] ) ) : ?>
          <p class="profile-org-role"><?php echo $profile_meta['_cmb_role_position'][0]; ?></p>
          <?php endif; ?>
        </header>

        <?php the_content(); ?>

        <?php include_once( CHILD_SS_DIR . '/modules/profile-connections.php' ); ?>

      </article>

    <?php endwhile; ?>

    <?php get_sidebar(); ?>

  </main>
</div>

<?php get_footer(); ?>
