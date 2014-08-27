<?php
/* Bones Custom Post Type Example
This page walks you through creating
a custom post type and taxonomies. You
can edit this one or copy the following code
to create another one.

I put this in a seperate file so as to
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/


/**
 * Ceate the function for the custom type
*/
function cpt_partners() {

  /**
   *  Register the custom type
  */
  register_post_type( 'partners', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */

    /**
     *  Add all the options for this post type
    */
    array(
      'labels' => array(
        'name'                => __( 'Partners', 'post type general name' ), /* This is the Title of the Group */
        'singular_name'       => __( 'Partner', 'post type singular name' ), /* This is the individual type */
        'add_new'             => __( 'Add New', 'custom post type item' ), /* The add new menu item */
        'add_new_item'        => __( 'Add New Partner' ), /* Add New Display Title */
        'edit'                => __( 'Edit' ), /* Edit Dialog */
        'edit_item'           => __( 'Edit Partner' ), /* Edit Display Title */
        'new_item'            => __( 'New Partner' ), /* New Display Title */
        'view_item'           => __( 'View Partner' ), /* View Display Title */
        'search_items'        => __( 'Search Partners' ), /* Search Custom Type Title */
        'not_found'           =>  __( 'Nothing found in the Database.' ), /* This displays if there are no entries yet */
        'not_found_in_trash'  => __( 'Nothing found in Trash' ), /* This displays if there is nothing in the trash */
        'parent_item_colon'   => ''
      ), /* end of labels */
      'description'         => __( 'This is a custom post type' ), /* Custom Type Description */
      'public'              => true,
      'publicly_queryable'  => true,
      'exclude_from_search' => false,
      'show_ui'             => true,
      'query_var'           => true,
      /* This controls the leading slug for your posts */
      'rewrite'             => array(
        'slug'              => 'partner',
        'with_front'        => false
      ),
      'capability_type'     => 'post',
      'hierarchical'        => false,
      /* this is what order you want it to appear in on the left hand side menu */
      //'menu_position'       => 40,
      /* the next one is important, it tells what's enabled in the post editor */
      'supports'            => array('title', 'editor', 'author', 'thumbnail', 'excerpt', ),
      //'register_meta_box_cb' => 'add_cpt_metaboxes'
    ) /* end of options */
  ); /* end of register post type */
}

  // adding the function to the Wordpress init
  add_action( 'init', 'cpt_partners' );
?>
