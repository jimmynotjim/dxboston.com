<?php get_header(); ?>

<div class="container">
  <main role="main" class="site-content">

    <article class="page-article">

      <header class="page-header has-image">
        <figure class="post-hero">
          <img src="<?php echo CHILD_SS_URI; ?>/assets/img/404-header.png" class="post-hero__image" />
        </figure>
        <h1 class="page-title">Hmmm...It's Not Here</h1>
      </header>

      <p class="pull-text">We can’t find what you were looking for. If it’s something that should be here, let us know. If you’re looking for something, why not try to search for it?</p>

      <?php include_once( CHILD_SS_DIR . '/modules/mod-search-form.php' ); ?>

    </article>

  <?php get_sidebar(); ?>

  </main>
</div>

<?php get_footer(); ?>
