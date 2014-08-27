<?php
/*
  Template Name: Posts Landing
 */
?>

<?php get_header(); ?>

<div class="container">
  <main role="main" class="site-content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <article class="page-article">

        <?php the_content(); ?>

        <ul class="landing-list landing-list--posts">
          <?php
            $paged      = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $post_args  = array(
              'paged'           => $paged,
              'post_type'       => 'post',
              'orderby'         => 'date',
              'order'           => 'DESC',
              'posts_per_page'  => 8,
            );

            $post_query = new WP_Query( $post_args );

            if ( $post_query->have_posts() ) while ( $post_query->have_posts() ) : $post_query->the_post();

            $preview_image  = get_post_meta( $post->ID, '_cmb_preview_image', true );
            $has_image      = !empty( $preview_image );
            $image_class    = $has_image ? 'has-image' : 'no-image';
            $categories     = get_the_category();
          ?>
          <li class="landing-item landing-item--posts <?php echo $image_class; ?>">
            <a href="<?php the_permalink(); ?>">
              <header class="landing-item__header">
                <p class="post-type"><?php echo $categories[0]->name; ?></p>
                <?php if ( $has_image ) : ?>
                <img src="<?php echo $preview_image; ?>" />
                <?php endif; ?>
                <h2><?php the_title(); ?></h2>
              </header>
              <?php if ( !$has_image ) : ?><?php the_excerpt(); ?><?php endif; ?>
              <p class="byline"><?php the_date(); ?> - By <?php the_author(); ?></p>
            </a>
          </li>
          <?php endwhile; ?>

        </ul>

        <?php if ( function_exists( 'pagination' ) ) { pagination( $post_query, $paged, null, 2 ); } ?>

        <?php wp_reset_postdata(); ?>

      </article>

    <?php endwhile; ?>

  </main>
</div>

<?php get_footer(); ?>
