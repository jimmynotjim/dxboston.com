<ul class="partners-list">
  <?php
    $partner_args = array(
      'post_type'   => 'partners',
      'orderby'     => 'menu_order',
      'order'       => 'ASC'
    );
    $partner_query = new WP_Query( $partner_args );

    if ( $partner_query->have_posts() ) while ( $partner_query->have_posts() ) : $partner_query->the_post();
    $partner_logo = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
  ?>
  <li style="background-image:url('<?php echo $partner_logo[0]; ?>');"><?php the_title(); ?></li>
  <?php
    endwhile;
    wp_reset_postdata();
  ?>
</ul>
