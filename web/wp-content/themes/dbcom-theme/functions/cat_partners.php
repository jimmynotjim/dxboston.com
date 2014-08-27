<?php

register_taxonomy( 'partner-type',
  array( 'partners' ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
  array(
    'labels'             => array(
      'name'              => __( 'Partner Types', 'post type general name' ), /* name of the custom taxonomy */
      'singular_name'     => __( 'Partner Type', 'post type singular name' ), /* single taxonomy name */
      'search_items'      => __( 'Search Partner Types' ), /* search title for taxomony */
      'all_items'         => __( 'All Partner Types' ), /* all title for taxonomies */
      'parent_item'       => __( 'Parent Partner Type' ), /* parent title for taxonomy */
      'parent_item_colon' => __( 'Parent Partner Type:' ), /* parent taxonomy title */
      'edit_item'         => __( 'Edit Partner Type' ), /* edit custom taxonomy title */
      'update_item'       => __( 'Update Partner Type' ), /* update title for taxonomy */
      'add_new_item'      => __( 'Add New Partner Type' ), /* add new title for taxonomy */
      'new_item_name'     => __( 'New Partner Type Name' ), /* name title for taxonomy */
      'menu_name'         => __( 'Partner Types' ) /* name to display in the menu */
    ),
    'hierarchical'      => true,     /* if this is true, it acts like categories */
    'show_admin_column' => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => array(
      'slug'  => 'partner-type'
    ),
  )
);

?>
