<?php get_header(); ?>

<div class="container">
  <main role="main" class="site-content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <?php
        $post_meta = get_post_meta( $post->ID );
        $categories = get_the_category();
      ?>
      <article class="post-article">
        <?php if ( has_post_thumbnail() ) : ?>
        <header class="post-header has-image">
          <p class="post-type"><?php echo $categories[0]->name; ?></p>
          <figure class="post-hero">
            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'post-hero' ); ?>" class="post-hero__image" />
            <?php if ( isset( $post_meta['_cmb_image_credit_val'] ) ) : ?>
            <figcaption class="post-hero__caption"><?php echo $post_meta['_cmb_image_credit_val'][0]; ?></figcaption>
            <?php endif; ?>
          </figure>
          <h1 class="post-title"><?php the_title(); ?></h1>
        </header>
        <?php else : ?>
        <header class="post-header no-image">
          <p class="post-type"><?php echo $categories[0]->name; ?></p>
          <h1 class="post-title"><?php the_title(); ?></h1>
        </header>
        <?php endif; ?>
        <div class="social-share">
          <ul class="social nav">
            <?php
              $url    = get_permalink();
              $title  = get_the_title();
              $media  = ( has_post_thumbnail( $post->ID ) ) ? wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) : CHILD_SS_URI . '/assets/img/placeholder.png';
            ?>
            <li class="twitter-share" data-url="<?php echo $url; ?>" data-text="<?php echo $title; ?>" data-title="Tweet"></li>
            <li class="fb-share" data-url="<?php echo $url; ?>" data-text="<?php echo $title; ?>" data-title="Like"></li>
          </ul>
          <span class="share-heading">Share This</span>
        </div>
        <?php the_content(); ?>
      </article>

      <hr class="post-rule" />

      <aside class="author-details">
        <?php
          $author_id =  get_the_author_meta( 'ID' );
          $profile_photo = get_wp_user_avatar_src( $author_id, 320 );
        ?>
        <img src="<?php echo $profile_photo; ?>" class="author-image" />
        <div class="author-byline">
          <p class="author-meta">Posted on <?php the_date(); ?> by <strong class="author-name"><?php the_author(); ?></strong></p>
          <p class="author-bio"><?php echo get_the_author_meta( 'description' ); ?></p>
        </div>
      </aside>

      <nav class="post-pagination">
        <div class="prev"><?php previous_post_link('%link', '<strong>Previous Post</strong> %title', true); ?></div>
        <div class="home"><a href="<?php echo WWW_URL; ?>/community/">Community</a></div>
        <div class="next"><?php next_post_link('%link', '<strong>Next Post</strong> %title', true); ?></div>
      </nav>

      <?php if ( comments_open() || '0' != get_comments_number() ) : ?>

        <?php comments_template(); ?>

      <?php endif; ?>

    <?php endwhile; ?>

    <?php get_sidebar(); ?>

  </main>
</div>

<?php get_footer(); ?>
