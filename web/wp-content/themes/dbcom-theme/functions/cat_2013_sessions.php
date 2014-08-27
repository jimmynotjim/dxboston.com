<?php

register_taxonomy( 'session-type',
  array( 'sessions' ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
  array(
    'labels'            => array(
      'name'              => __( 'Session Types', 'post type general name' ), /* name of the custom taxonomy */
      'singular_name'     => __( 'Session Type', 'post type singular name' ), /* single taxonomy name */
      'search_items'      => __( 'Search Session Types' ), /* search title for taxomony */
      'all_items'         => __( 'All Session Types' ), /* all title for taxonomies */
      'parent_item'       => __( 'Parent Session Type' ), /* parent title for taxonomy */
      'parent_item_colon' => __( 'Parent Session Type:' ), /* parent taxonomy title */
      'edit_item'         => __( 'Edit Session Type' ), /* edit custom taxonomy title */
      'update_item'       => __( 'Update Session Type' ), /* update title for taxonomy */
      'add_new_item'      => __( 'Add New Session Type' ), /* add new title for taxonomy */
      'new_item_name'     => __( 'New Session Type Name' ), /* name title for taxonomy */
      'menu_name'         => __( 'Session Types' ) /* name to display in the menu */
    ),
    'hierarchical'      => true,     /* if this is true, it acts like categories */
    'show_admin_column' => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => array(
      'slug'  => 'session-type'
    ),
  )
);

?>
