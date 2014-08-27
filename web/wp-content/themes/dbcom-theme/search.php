<?php get_header(); ?>

<div class="container">
  <main role="main" class="site-content">

    <article class="page-article">

      <header class="page-header no-image">
        <h1 class="page-title">Search Results</h1>
      </header>

      <p class="pull-text">Based on a search for <em><?php echo esc_attr( get_search_query() ); ?></em>, here are a few options that might be a match:</p>

      <ul class="landing-list landing-list--results">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <?php include( PARENT_TMPL_DIR . '/modules/mod-post-preview.php' ); ?>

      <?php endwhile; ?>
      </ul>

      <?php if ( function_exists( 'pagination' ) ) { pagination(); } ?>

    </article>

  <?php get_sidebar(); ?>

  </main>
</div>

<?php get_footer(); ?>
