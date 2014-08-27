<?php $postID = get_the_ID(); ?>
<?php $page_meta = get_post_meta( $postID ); ?>

<ul class="icon-list icon-list--track">
  <li class="icon-item icon-item--track">
    <img src="<?php echo $page_meta['_cmb_icon_image_1'][0]; ?>" class="icon-img">
    <div class="icon-content">
      <h3><?php echo $page_meta['_cmb_heading_text_1'][0]; ?></h3>
      <p><strong><?php echo $page_meta['_cmb_subheading_text_1'][0]; ?></strong></p>
      <p><?php echo $page_meta['_cmb_body_text_1'][0]; ?></p>
    </div>
  </li>
  <li class="icon-item icon-item--track">
    <img src="<?php echo $page_meta['_cmb_icon_image_2'][0]; ?>" class="icon-img">
    <div class="icon-content">
      <h3><?php echo $page_meta['_cmb_heading_text_2'][0]; ?></h3>
      <p><strong><?php echo $page_meta['_cmb_subheading_text_2'][0]; ?></strong></p>
      <p><?php echo $page_meta['_cmb_body_text_2'][0]; ?></p>
    </div>
  </li>
  <li class="icon-item icon-item--track">
    <img src="<?php echo $page_meta['_cmb_icon_image_3'][0]; ?>" class="icon-img">
    <div class="icon-content">
      <h3><?php echo $page_meta['_cmb_heading_text_3'][0]; ?></h3>
      <p><strong><?php echo $page_meta['_cmb_subheading_text_3'][0]; ?></strong></p>
      <p><?php echo $page_meta['_cmb_body_text_3'][0]; ?></p>
    </div>
  </li>
</ul>
