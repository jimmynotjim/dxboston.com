<?php $postID = get_the_ID(); ?>
<?php $page_meta = get_post_meta( $postID ); ?>
<ul class="home-grid">
  <li style="background-image:url('<?php echo $page_meta['_cmb_preview_image_1'][0]; ?>');" class="home-grid__item <?php if ( $page_meta['_cmb_alt_layout_1'][0] == 'on' ) { echo 'alt-layout'; } ?>">
    <h3 class="heading"><?php echo $page_meta['_cmb_heading_text_1'][0]; ?></h3>
    <?php if ( isset( $page_meta['_cmb_alt_layout_1'][0] ) && $page_meta['_cmb_alt_layout_1'][0] == 'on' ) { ?><p class="sub-heading"><?php echo $page_meta['_cmb_subheading_text_1'][0]; ?></p><?php } ?>
    <a href="<?php echo $page_meta['_cmb_button_url_1'][0]; ?>" class="btn btn--lrg"><?php echo $page_meta['_cmb_button_text_1'][0]; ?></a>
  </li>
  <li style="background-image:url('<?php echo $page_meta['_cmb_preview_image_2'][0]; ?>');" class="home-grid__item <?php if ( $page_meta['_cmb_alt_layout_2'][0] == 'on' ) { echo 'alt-layout'; } ?>">
    <h3 class="heading"><?php echo $page_meta['_cmb_heading_text_2'][0]; ?></h3>
    <?php if ( isset( $page_meta['_cmb_alt_layout_2'][0] ) && $page_meta['_cmb_alt_layout_2'][0] == 'on' ) { ?><p class="sub-heading"><?php echo $page_meta['_cmb_subheading_text_2'][0]; ?></p><?php } ?>
    <a href="<?php echo $page_meta['_cmb_button_url_2'][0]; ?>" class="btn btn--lrg"><?php echo $page_meta['_cmb_button_text_2'][0]; ?></a>
  </li>
</ul>
