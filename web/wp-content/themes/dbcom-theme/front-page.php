<?php get_header(); ?>

<div class="container">
  <main role="main" class="site-content">

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php $home_meta = get_post_meta( $post->ID ); ?>

    <article class="home-article">
      <section class="home-intro">
        <h2><?php echo $home_meta['_cmb_intro_heading_text'][0]; ?></h2>
        <p><?php echo $home_meta['_cmb_intro_text'][0]; ?></p>
      </section>

      <section class="home-buttons">
        <a href="<?php echo $home_meta['_cmb_cta_url_1'][0]; ?>" class="btn btn--lrg btn--full"><?php echo $home_meta['_cmb_cta_text_1'][0]; ?></a>
        <a href="<?php echo $home_meta['_cmb_cta_url_2'][0]; ?>" class="btn btn--lrg btn--full"><?php echo $home_meta['_cmb_cta_text_2'][0]; ?></a>
      </section>

      <section class="home-follow">
        <!-- Begin MailChimp Signup Form -->
        <div id="mc_embed_signup" class="email-signup--home">
          <form action="http://dxboston.us7.list-manage1.com/subscribe/post?u=083d809e2888fb1db72dacdeb&amp;id=daecbf493f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="single-input-form validate" target="_blank" novalidate>
            <label>Get on our email list</label>
            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Enter Your Email" required>
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;"><input type="text" name="b_083d809e2888fb1db72dacdeb_daecbf493f" value=""></div>
            <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="submit solid mc-submit">Sign Up</button>

          </form>
        </div>
        <!--End mc_embed_signup-->

        <ul class="social nav">
          <li><a href="http://www.facebook.com/designexchangeboston" class="btn btn--social btn--facebook">facebook</a></li>
          <li><a href="https://twitter.com/dxboston" class="btn btn--social btn--twitter"><span>twitter</span></a></li>
          <li><a href="http://instagram.com/designexchangeboston" class="btn btn--social btn--instagram"><span>instagram</span></a></li>
        </ul>
      </section>

      <section class="home-content">
        <?php the_content(); ?>
      </section>

    </article>

    <ul class="home-grid">
      <li style="background-image:url('<?php echo $home_meta['_cmb_preview_image_1'][0]; ?>');" class="home-grid__item <?php if ( $home_meta['_cmb_alt_layout_1'][0] == 'on' ) { echo 'alt-layout'; } ?>">
        <h3 class="heading"><?php echo $home_meta['_cmb_heading_text_1'][0]; ?></h3>
        <?php if ( isset( $home_meta['_cmb_alt_layout_1'][0] ) && $home_meta['_cmb_alt_layout_1'][0] == 'on' ) { ?><p class="sub-heading"><?php echo $home_meta['_cmb_subheading_text_1'][0]; ?></p><?php } ?>
        <a href="<?php echo $home_meta['_cmb_button_url_1'][0]; ?>" class="btn btn--lrg"><?php echo $home_meta['_cmb_button_text_1'][0]; ?></a>
      </li>
      <li style="background-image:url('<?php echo $home_meta['_cmb_preview_image_2'][0]; ?>');" class="home-grid__item <?php if ( $home_meta['_cmb_alt_layout_2'][0] == 'on' ) { echo 'alt-layout'; } ?>">
        <h3 class="heading"><?php echo $home_meta['_cmb_heading_text_2'][0]; ?></h3>
        <?php if ( isset( $home_meta['_cmb_alt_layout_2'][0] ) && $home_meta['_cmb_alt_layout_2'][0] == 'on' ) { ?><p class="sub-heading"><?php echo $home_meta['_cmb_subheading_text_2'][0]; ?></p><?php } ?>
        <a href="<?php echo $home_meta['_cmb_button_url_2'][0]; ?>" class="btn btn--lrg"><?php echo $home_meta['_cmb_button_text_2'][0]; ?></a>
      </li>
      <li style="background-image:url('<?php echo $home_meta['_cmb_preview_image_3'][0]; ?>');" class="home-grid__item <?php if ( $home_meta['_cmb_alt_layout_3'][0] == 'on' ) { echo 'alt-layout'; } ?>">
        <h3 class="heading"><?php echo $home_meta['_cmb_heading_text_3'][0]; ?></h3>
        <?php if ( isset( $home_meta['_cmb_alt_layout_3'][0] ) && $home_meta['_cmb_alt_layout_3'][0] == 'on' ) { ?><p class="sub-heading"><?php echo $home_meta['_cmb_subheading_text_3'][0]; ?></p><?php } ?>
        <a href="<?php echo $home_meta['_cmb_button_url_3'][0]; ?>" class="btn btn--lrg"><?php echo $home_meta['_cmb_button_text_3'][0]; ?></a>
      </li>
      <li style="background-image:url('<?php echo $home_meta['_cmb_preview_image_4'][0]; ?>');" class="home-grid__item <?php if ( $home_meta['_cmb_alt_layout_4'][0] == 'on' ) { echo 'alt-layout'; } ?>">
        <h3 class="heading"><?php echo $home_meta['_cmb_heading_text_4'][0]; ?></h3>
        <?php if ( isset( $home_meta['_cmb_alt_layout_4'][0] ) && $home_meta['_cmb_alt_layout_4'][0] == 'on' ) { ?><p class="sub-heading"><?php echo $home_meta['_cmb_subheading_text_4'][0]; ?></p><?php } ?>
        <a href="<?php echo $home_meta['_cmb_button_url_4'][0]; ?>" class="btn btn--lrg"><?php echo $home_meta['_cmb_button_text_4'][0]; ?></a>
      </li>
    </ul>

    <?php include_once( CHILD_SS_DIR . '/modules/partners-list.php' ); ?>

    <?php endwhile; ?>

  </main>
</div>

<?php get_footer(); ?>
