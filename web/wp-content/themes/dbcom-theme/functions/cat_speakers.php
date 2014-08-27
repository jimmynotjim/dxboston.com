<?php

register_taxonomy( 'speaker-type',
  array( 'speakers' ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
  array(
    'labels'            => array(
      'name'              => __( 'Speaker Types', 'post type general name' ), /* name of the custom taxonomy */
      'singular_name'     => __( 'Speaker Type', 'post type singular name' ), /* single taxonomy name */
      'search_items'      => __( 'Search Speaker Types' ), /* search title for taxomony */
      'all_items'         => __( 'All Speaker Types' ), /* all title for taxonomies */
      'parent_item'       => __( 'Parent Speaker Type' ), /* parent title for taxonomy */
      'parent_item_colon' => __( 'Parent Speaker Type:' ), /* parent taxonomy title */
      'edit_item'         => __( 'Edit Speaker Type' ), /* edit custom taxonomy title */
      'update_item'       => __( 'Update Speaker Type' ), /* update title for taxonomy */
      'add_new_item'      => __( 'Add New Speaker Type' ), /* add new title for taxonomy */
      'new_item_name'     => __( 'New Speaker Type Name' ), /* name title for taxonomy */
      'menu_name'         => __( 'Speaker Types' ) /* name to display in the menu */
    ),
    'hierarchical'      => true,     /* if this is true, it acts like categories */
    'show_admin_column' => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => array(
      'slug'  => 'speaker-type'
    ),
  )
);

?>
