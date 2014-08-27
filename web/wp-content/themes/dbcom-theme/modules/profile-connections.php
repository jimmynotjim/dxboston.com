<ul class="profile-connections">
  <?php if ( isset( $profile_meta['_cmb_website_url'][0] ) ) : ?>
  <li class="connection website">
    <a href="<?php echo $profile_meta['_cmb_website_url'][0]; ?>">
      <span class="btn btn--social btn--website"></span>
      <span><?php echo $profile_meta['_cmb_website_url'][0]; ?></span>
    </a>
  </li>
  <?php endif; ?>

  <?php if ( isset( $profile_meta['_cmb_twitter_profile'][0] ) ) : ?>
  <li class="connection twitter">
    <a href="https://www.twitter.com/<?php echo $profile_meta['_cmb_twitter_profile'][0]; ?>">
      <span class="btn btn--social btn--twitter"></span>
      <span><?php echo $profile_meta['_cmb_twitter_profile'][0]; ?></span>
    </a>
  </li>
  <?php endif; ?>

  <?php if ( isset( $profile_meta['_cmb_facebook_profile'][0] ) ) : ?>
  <li class="connection facebook">
    <a href="<?php echo $profile_meta['_cmb_facebook_profile'][0]; ?>">
      <span class="btn btn--social btn--facebook"></span>
      <span><?php the_title(); ?></span>
    </a>
  </li>
  <?php endif; ?>

  <?php if ( isset( $profile_meta['_cmb_linkedin_profile'][0] ) ) : ?>
  <li class="connection linkedin">
    <a href="<?php echo $profile_meta['_cmb_linkedin_profile'][0]; ?>">
      <span class="btn btn--social btn--linkedin"></span>
      <span>LinkedIn</span>
    </a>
  </li>
  <?php endif; ?>

  <?php if ( isset( $profile_meta['_cmb_email_address'][0] ) ) : ?>
  <li class="connection email">
    <a href="mailto:<?php echo $profile_meta['_cmb_email_address'][0]; ?>">
      <span class="btn btn--social btn--email"></span>
      <span>email</span>
    </a>
  </li>
  <?php endif; ?>
</ul>
