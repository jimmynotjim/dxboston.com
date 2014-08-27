<?php get_header(); ?>


<div class="container">
  <main role="main" class="site-content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <article class="page-article">

        <?php if ( has_post_thumbnail() ) : ?>
        <header class="page-header has-image">
          <figure class="post-hero">
            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'post-hero' ); ?>" class="post-hero__image" />
            <?php if ( isset( $post_meta['_cmb_image_credit_val'] ) ) : ?>
            <figcaption class="post-hero__caption"><?php echo $post_meta['_cmb_image_credit_val'][0]; ?></figcaption>
            <?php endif; ?>        </figure>
          <h1 class="page-title"><?php the_title(); ?></h1>
        </header>
        <?php else : ?>
        <header class="page-header no-image">
          <h1 class="page-title"><?php the_title(); ?></h1>
        </header>
        <?php endif; ?>

        <?php the_content(); ?>

      </article>

      <?php
        if ( is_page( 'dxb360' ) ) {
          include( CHILD_SS_DIR . '/modules/360-grid.php' );
        }
      ?>

    <?php endwhile; ?>

    <?php get_sidebar(); ?>

  </main>
</div>

<?php get_footer(); ?>
