<?php

register_taxonomy( 'team-type',
  array( 'team' ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
  array(
    'labels'             => array(
      'name'              => __( 'Member Types', 'post type general name' ), /* name of the custom taxonomy */
      'singular_name'     => __( 'Member Type', 'post type singular name' ), /* single taxonomy name */
      'search_items'      => __( 'Search Member Types' ), /* search title for taxomony */
      'all_items'         => __( 'All Member Types' ), /* all title for taxonomies */
      'parent_item'       => __( 'Parent Member Type' ), /* parent title for taxonomy */
      'parent_item_colon' => __( 'Parent Member Type:' ), /* parent taxonomy title */
      'edit_item'         => __( 'Edit Member Type' ), /* edit custom taxonomy title */
      'update_item'       => __( 'Update Member Type' ), /* update title for taxonomy */
      'add_new_item'      => __( 'Add New Member Type' ), /* add new title for taxonomy */
      'new_item_name'     => __( 'New Member Type Name' ), /* name title for taxonomy */
      'menu_name'         => __( 'Member Types' ) /* name to display in the menu */
    ),
    'hierarchical'      => true,     /* if this is true, it acts like categories */
    'show_admin_column' => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => array(
      'slug'  => 'team-type'
    ),
  )
);

?>
