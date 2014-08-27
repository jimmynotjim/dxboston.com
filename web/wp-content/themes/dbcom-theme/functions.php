<?php

/**
 * Define Global Exterior Account Variables
 * Uncomment and edit these as you need them
 */

if (!defined('WP_ENV')) {
  // Set environment to the last sub-domain (e.g. foo.staging.site.com => 'staging')
  define( 'WP_ENV', array_pop( array_splice( explode( '.', $_SERVER['HTTP_HOST'] ), 0, -2 ) ) );
}

define( 'CHILD_SS_URI', get_stylesheet_directory_uri() );
define( 'CHILD_SS_DIR', get_stylesheet_directory() );
define( 'DEFAULT_PHOTO', CHILD_SS_URI .'/assets/img/dxb-avatar_full.png' );
define( 'DEFAULT_THUMB', CHILD_SS_URI . '/assets/img/dxb-avatar_thumb.png' );

//define( 'TYPEKIT', '123456' );
//define( 'HFJ_ACCOUNT', '123456' );
//define( 'HFJ_PROJECT', 123456);
//define( 'GOOGLE_PLUS_AUTHOR', '' );
//define( 'FB_APP_ID', '' );
//define( 'TWITTER_USERNAME', '' );
//define( 'FB_PAGE', '' );
//define( 'GOOGLE_PLUS_PUBLISHER', '' );


/**
 * Add new classes to the $classes array
 * http://codex.wordpress.org/Function_Reference/body_class#Add_Classes_By_Filters
 */
add_filter( 'body_class','my_class_names' );
function my_class_names( $classes ) {
  global $post;

  if ( is_front_page() ) :
    $classes[] = 'home';
  elseif ( is_page() ) :
    $classes[] = $post->post_name;
  elseif( is_archive() ) :
    $classes[] = 'archive';
  elseif( is_404() ) :
    $classes[] = 'error';
  elseif( is_search() ) :
    $classes[] = 'search';
  endif;

  return $classes;
}


/**
 * Remove brakcets from ellipse
 */
function excerpt_ellipse( $text ) {
  return str_replace( '[...]', '&#8230;', $text );
}
add_filter( 'get_the_excerpt', 'excerpt_ellipse' );


/** IMAGES
 *
 * Add Post Thumbnails
 */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true );

/*
 *  ADD SUPPORT FOR VARIOUS THUMBNAIL SIZES
 *  http://codex.wordpress.org/Function_Reference/add_image_size
 */
if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'post-thumb', 860, 700, true ); //(cropped)
  add_image_size( 'post-hero', 2120, 1096, true );
  add_image_size( 'profile-thumb', 320, 320, true );
  add_image_size( 'profile-full', 1040, 1040, true );
}


/**
 * Remove paragraph tags from images
 * Source: http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/
 */
function filter_ptags_on_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');


/**
 * Remove Yoast SEO Canonical URLs + WP SEO Title
 * http://yoast.com/wordpress/seo/api/#highlighter_245949
 */
function wpseo_disable_rel_next_home( $link ) {
  if ( is_front_page() ) {
    return false;
  }
}
add_filter( 'wpseo_next_rel_link', 'wpseo_disable_rel_next_home' );


/**
 * Add Class to first Paragraph in WordPress the_content();
 * Source: http://webdevbits.com/wordpress/add-class-to-first-paragraph-in-wordpress-the_content/
 */
function first_paragraph( $content ) {
  if ( !is_singular( array( 'team', 'speakers' ) ) && !is_front_page() ) :
    return preg_replace('/<p([^>]+)?>/', '<p$1 class="post-intro pull-text">', $content, 1);
  else:
    return $content;
  endif;
}
add_filter( 'the_content', 'first_paragraph' );


/**
 * Load Development Styles/Scripts (for local)
 */
function load_dev_styles_scripts() {
  // Theme styles
  wp_enqueue_style( 'themename', CHILD_SS_URI . '/assets/dev/style.css', false, null, 'all' );

  // Header Scripts
  wp_enqueue_script( 'header_scripts', CHILD_SS_URI . '/assets/dev/header.js', array(), null, false );

  // Footer Scripts
  wp_enqueue_script( 'footer_scripts', CHILD_SS_URI . '/assets/dev/footer.js', array( 'jquery' ), null, true );

  // Single Scripts
  if ( is_single() ) {
    wp_enqueue_script( 'single_scripts', CHILD_SS_URI . '/assets/dev/single.js', array( 'jquery' ), null, true );
  }
}
if ( !is_admin() && 'local' == WP_ENV ) add_action( 'wp_enqueue_scripts', 'load_dev_styles_scripts' );


/**
 * Load Distribution Styles/Scripts (for staging and production)
 */
function load_prod_styles_scripts() {
  // Theme styles
  wp_enqueue_style( 'themename', CHILD_SS_URI . '/assets/dist/style.min.css', false, null, 'all' );

  // Header Scripts
  wp_enqueue_script( 'header_scripts', CHILD_SS_URI . '/assets/dist/header.min.js', array(), null, false );

  // Footer Scripts
  wp_enqueue_script( 'footer_scripts', CHILD_SS_URI . '/assets/dist/footer.min.js', array( 'jquery' ), null, true );

  // Single Scripts
  if ( is_single() ) {
    wp_enqueue_script( 'single_scripts', CHILD_SS_URI . '/assets/dist/single.min.js', array( 'jquery' ), null, true );
  }
}
if ( !is_admin() && 'local' != WP_ENV ) add_action( 'wp_enqueue_scripts', 'load_prod_styles_scripts' );


/**
 * Remove Query Strings from Static Resources
 * Source: http://forwpblogger.com/tutorial/remove-query-strings-from-static-resources/
 */
function _remove_script_version( $src ){
  $parts = explode( '?', $src );
  return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


/**
 * Posts 2 Posts Settings
 */
function my_connection_types() {
  p2p_register_connection_type(
    array(
      'name'                => 'multiple_speakers',
      'from'                => 'speakers',
      'to'                  => 'sessions',
      'reciprocal'          => true,
      'prevent_duplicates'  => true,
      'cardinality'         => 'many-to-many'
    )
  );
}
add_action( 'p2p_init', 'my_connection_types' );


/**
 * Include external function calls
 * Uncomment and edit these as you need them
 */
require_once( CHILD_SS_DIR . '/functions/display-post-thumbnails.php' );
require_once( CHILD_SS_DIR . '/functions/pagination.php' );
require_once( CHILD_SS_DIR . '/functions/cpt_speakers.php' );
require_once( CHILD_SS_DIR . '/functions/cpt_team.php' );
require_once( CHILD_SS_DIR . '/functions/cpt_partners.php' );
require_once( CHILD_SS_DIR . '/functions/cpt_sessions.php' );
require_once( CHILD_SS_DIR . '/functions/cat_speakers.php' );
require_once( CHILD_SS_DIR . '/functions/cat_team.php' );
require_once( CHILD_SS_DIR . '/functions/cat_partners.php' );
require_once( CHILD_SS_DIR . '/functions/cat_sections.php' );
require_once( CHILD_SS_DIR . '/functions/cat_2013_sessions.php' );
require_once( CHILD_SS_DIR . '/functions/metabox/dxb-metaboxes.php' );
require_once( CHILD_SS_DIR . '/functions/include-shortcode.php' );

//require_once( CHILD_SS_DIR . '/functions/gform_placeholder.php' );
//require_once( CHILD_SS_DIR . '/functions/Tax-meta-class/example-tax-meta.php' );

?>
