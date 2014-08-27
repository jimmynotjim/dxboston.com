<?php

register_taxonomy( 'page-sections',
  array( 'page', ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
  array(
    'labels'             => array(
      'name'              => __( 'Page Sections', 'post type general name' ), /* name of the custom taxonomy */
      'singular_name'     => __( 'Page Section', 'post type singular name' ), /* single taxonomy name */
      'search_items'      => __( 'Search Page Sections' ), /* search title for taxomony */
      'all_items'         => __( 'All Page Sections' ), /* all title for taxonomies */
      'parent_item'       => __( 'Parent Page Section' ), /* parent title for taxonomy */
      'parent_item_colon' => __( 'Parent Page Section:' ), /* parent taxonomy title */
      'edit_item'         => __( 'Edit Page Section' ), /* edit custom taxonomy title */
      'update_item'       => __( 'Update Page Section' ), /* update title for taxonomy */
      'add_new_item'      => __( 'Add New Page Section' ), /* add new title for taxonomy */
      'new_item_name'     => __( 'New Page Section Name' ), /* name title for taxonomy */
      'menu_name'         => __( 'Page Sections' ) /* name to display in the menu */
    ),
    'hierarchical'      => true,     /* if this is true, it acts like categories */
    'show_admin_column' => true,
    'show_ui'           => true,
    'query_var'         => true,
    'rewrite'           => array(
      'slug'  => 'page-sections'
    ),
  )
);

?>
