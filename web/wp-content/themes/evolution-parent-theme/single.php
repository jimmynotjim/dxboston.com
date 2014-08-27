<?php get_header(); ?>

<div role="main" class="main-container">

  <section class="content">

  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <article class="post-article">
      <?php if ( has_post_thumbnail() ) : ?>
      <header class="post-header has-img">
        <p class="post-type">Article</p>
        <?php display_post_thumbnail( $post->ID, 'post-hero', display_post_thumbnail_src( $post->ID, 'post-hero' ) ); ?>
        <h1 class="post-title"><?php the_title(); ?></h1>
      </header>
      <?php else : ?>
      <header class="post-header no-img">
        <p class="post-type">Article</p>
        <h1 class="post-title"><?php the_title(); ?></h1>
      </header>
      <?php endif; ?>
      <?php the_content(); ?>
    </article>

    <?php if ( comments_open() || '0' != get_comments_number() ) : ?>

      <?php comments_template(); ?>

    <?php endif; ?>

  <?php endwhile; ?>

  </section>

  <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
