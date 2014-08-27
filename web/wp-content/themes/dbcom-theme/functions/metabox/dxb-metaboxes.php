<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_dxb_metaboxes' );


/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_dxb_metaboxes( array $meta_boxes ) {

  /**
   * Start with an underscore to hide fields from custom fields list
  */
  $prefix = '_cmb_';

  $meta_boxes[] = array(
    'id'         => 'post-meta',
    'title'      => 'Extra Post Components',
    'pages'      => array( 'post', ), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => 'Preview Image',
        'desc' => 'Preview Image to be displayed at /community (Sized 860x700)',
        'id'   => $prefix . 'preview_image',
        'type' => 'file',
      ),
      array(
        'name' => 'Image Credit',
        'desc' => 'Enter the photographer\'s name for the featured image',
        'id'   => $prefix . 'image_credit_val',
        'type' => 'text',
      ),
    ),
  );

  $meta_boxes[] = array(
    'id'         => 'page-meta',
    'title'      => 'Extra Page Components',
    'pages'      => array( 'page', ), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => 'Image Credit',
        'desc' => 'Enter the photographer\'s name for the featured image',
        'id'   => $prefix . 'image_credit_val',
        'type' => 'text',
      ),
    ),
  );

  $meta_boxes[] = array(
    'id'         => 'session-meta',
    'title'      => 'Extra Session Components',
    'pages'      => array( 'sessions', ), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name'    => 'Track',
        'desc'    => 'Enter the session\'s track',
        'id'      => $prefix . 'session_track',
        'type'    => 'radio',
        'options' => array(
          array( 'name' => 'None', 'value' => 'none' ),
          array( 'name' => 'The Lab', 'value' => 'the-lab', ),
          array( 'name' => 'The Stage', 'value' => 'the-stage', ),
          array( 'name' => 'The Field', 'value' => 'the-field', ),
        ),
      ),
      array(
        'name'    => 'Format',
        'desc'    => 'Enter the session\'s format',
        'id'      => $prefix . 'session_format',
        'type'    => 'radio',
        'options' => array(
          array( 'name' => 'Panel', 'value' => 'panel', ),
          array( 'name' => 'Exhibit', 'value' => 'exhibit', ),
          array( 'name' => 'Performance', 'value' => 'performance', ),
          array( 'name' => 'Lightning Talk', 'value' => 'lightning', ),
          array( 'name' => 'Workshop', 'value' => 'workshop', ),
          array( 'name' => 'Keynote', 'value' => 'keynote', ),
          array( 'name' => 'Registration', 'value' => 'registration', ),
          array( 'name' => 'Lunch Break', 'value' => 'lunch-break', ),
          array( 'name' => 'Coffee Break', 'value' => 'coffee-break', ),
        ),
      ),
      array(
        'name'    => 'Location',
        'desc'    => 'Enter the session\'s location',
        'id'      => $prefix . 'session_location',
        'type'    => 'radio',
        'options' => array(
          array( 'name' => 'Assembly Room', 'value' => 'assembly-room', ),
          array( 'name' => 'Common Area', 'value' => 'common-area' ),
          array( 'name' => 'Pod One', 'value' => 'pod-one', ),
          array( 'name' => 'Pod Two', 'value' => 'pod-two', ),
          array( 'name' => 'General Assemby', 'value' => 'general-assembly' )
        ),
      ),
      array(
        'name' => 'Start Date & Time',
        'desc' => '',
        'id'   => $prefix . 'session_start_timestamp',
        'type' => 'text_datetime_timestamp',
      ),
      array(
        'name' => 'End Date & Time',
        'desc' => '',
        'id'   => $prefix . 'session_end_timestamp',
        'type' => 'text_datetime_timestamp',
      ),
    ),
  );

  $meta_boxes[] = array(
    'id'         => 'people-meta',
    'title'      => 'Extra People Components',
    'pages'      => array( 'team', 'speakers', ), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => 'Organization Name',
        'desc' => 'Enter the person\'s organization name',
        'id'   => $prefix . 'organization_name',
        'type' => 'text'
      ),
      array(
        'name' => 'Role/Position',
        'desc' => 'Enter the person\'s role/position',
        'id'   => $prefix . 'role_position',
        'type' => 'text'
      ),
      array(
        'name' => 'Website',
        'desc' => 'Enter this person\'s personal website URL (including http://)',
        'id'   => $prefix . 'website_url',
        'type' => 'text'
      ),
      array(
        'name' => 'Twitter Profile',
        'desc' => 'Enter this person\'s twitter user name (without @)',
        'id'   => $prefix . 'twitter_profile',
        'type' => 'text'
      ),
      array(
        'name' => 'Facebook Profile',
        'desc' => 'Enter this person\'s facebook profile URL (inlcuding http://)',
        'id'   => $prefix . 'facebook_profile',
        'type' => 'text'
      ),
      array(
        'name' => 'LinkedIn Profile',
        'desc' => 'Enter this person\'s LinkedIn profile URL (inlcuding http://)',
        'id'   => $prefix . 'linkedin_profile',
        'type' => 'text'
      ),
      array(
        'name' => 'Email',
        'desc' => 'Enter this person\'s Email Address',
        'id'   => $prefix . 'email_address',
        'type' => 'text'
      ),
      array(
        'name' => 'Event Year',
        'desc' => 'Enter the latest year this person has participated in DxBoston (ex 2014)',
        'id'   => $prefix . 'event_year',
        'type' => 'text'
      ),
    ),
  );

  $meta_boxes[] = array(
    'id'         => 'home-meta',
    'title'      => 'Extra Home Components',
    'pages'      => array( 'page' ),
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        357
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'fields'     => array(
      array(
        'name' => 'Intro Heading',
        'desc' => 'Enter the text for the intro heading',
        'id'   => $prefix . 'intro_heading_text',
        'type' => 'text',
      ),
      array(
        'name' => 'Intro Text',
        'desc' => 'Enter the text for the intro',
        'id'   => $prefix . 'intro_text',
        'type' => 'textarea',
      ),
      array(
        'name' => 'Top Button Text',
        'desc' => 'Enter the text for the top button',
        'id'   => $prefix . 'cta_text_1',
        'type' => 'text',
      ),
      array(
        'name' => 'Top Button URL',
        'desc' => 'Enter the URL for the top button',
        'id'   => $prefix . 'cta_url_1',
        'type' => 'text',
      ),
      array(
        'name' => 'Bottom Button Text',
        'desc' => 'Enter the text for the bottom button',
        'id'   => $prefix . 'cta_text_2',
        'type' => 'text',
      ),
      array(
        'name' => 'Bottom Button URL',
        'desc' => 'Enter the URL for the bottom button',
        'id'   => $prefix . 'cta_url_2',
        'type' => 'text',
      ),
    )
  );

  $meta_boxes[] = array(
    'id'         => 'home_group_1',
    'title'      => 'Home Page Group 1',
    'pages'      => array( 'page', ), // Post type
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        357
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_1',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text (only for alt layout)',
        'id'   => $prefix . 'subheading_text_1',
        'type' => 'text',
      ),
      array(
        'name' => 'Button Text',
        'desc' => 'Enter the text to show in the button',
        'id'   => $prefix . 'button_text_1',
        'type' => 'text',
      ),
      array(
        'name' => 'Button URL',
        'desc' => 'Enter the URL you want to link to',
        'id'   => $prefix . 'button_url_1',
        'type' => 'text',
      ),
      array(
        'name' => 'Preview Image',
        'desc' => 'Preview Image to be displayed (Sized 860x700)',
        'id'   => $prefix . 'preview_image_1',
        'type' => 'file',
      ),
      array(
        'name' => 'Alternate Layout',
        'desc' => 'Check this if the group should use the alt layout',
        'id'   => $prefix . 'alt_layout_1',
        'type' => 'checkbox',
      ),
    ),
  );

  $meta_boxes[] = array(
    'id'         => 'home_group_2',
    'title'      => 'Home Page Group 2',
    'pages'      => array( 'page', ), // Post type
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        357
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_2',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text (only for alt layout)',
        'id'   => $prefix . 'subheading_text_2',
        'type' => 'text',
      ),
      array(
        'name' => 'Button Text',
        'desc' => 'Enter the text to show in the button',
        'id'   => $prefix . 'button_text_2',
        'type' => 'text',
      ),
      array(
        'name' => 'Button URL',
        'desc' => 'Enter the URL you want to link to',
        'id'   => $prefix . 'button_url_2',
        'type' => 'text',
      ),
      array(
        'name' => 'Preview Image',
        'desc' => 'Preview Image to be displayed (Sized 860x700)',
        'id'   => $prefix . 'preview_image_2',
        'type' => 'file',
      ),
      array(
        'name' => 'Alternate Layout',
        'desc' => 'Check this if the group should use the alt layout',
        'id'   => $prefix . 'alt_layout_2',
        'type' => 'checkbox',
      ),
    ),
  );

  $meta_boxes[] = array(
    'id'         => 'home_group_3',
    'title'      => 'Home Page Group 3',
    'pages'      => array( 'page', ), // Post type
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        357
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_3',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text (only for alt layout)',
        'id'   => $prefix . 'subheading_text_3',
        'type' => 'text',
      ),
      array(
        'name' => 'Button Text',
        'desc' => 'Enter the text to show in the button',
        'id'   => $prefix . 'button_text_3',
        'type' => 'text',
      ),
      array(
        'name' => 'Button URL',
        'desc' => 'Enter the URL you want to link to',
        'id'   => $prefix . 'button_url_3',
        'type' => 'text',
      ),
      array(
        'name' => 'Preview Image',
        'desc' => 'Preview Image to be displayed (Sized 860x700)',
        'id'   => $prefix . 'preview_image_3',
        'type' => 'file',
      ),
      array(
        'name' => 'Alternate Layout',
        'desc' => 'Check this if the group should use the alt layout',
        'id'   => $prefix . 'alt_layout_3',
        'type' => 'checkbox',
      ),
    ),
  );

  $meta_boxes[] = array(
    'id'         => 'home_group_4',
    'title'      => 'Home Page Group 4',
    'pages'      => array( 'page', ), // Post type
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        357
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_4',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text (only for alt layout)',
        'id'   => $prefix . 'subheading_text_4',
        'type' => 'text',
      ),
      array(
        'name' => 'Button Text',
        'desc' => 'Enter the text to show in the button',
        'id'   => $prefix . 'button_text_4',
        'type' => 'text',
      ),
      array(
        'name' => 'Button URL',
        'desc' => 'Enter the URL you want to link to',
        'id'   => $prefix . 'button_url_4',
        'type' => 'text',
      ),
      array(
        'name' => 'Preview Image',
        'desc' => 'Preview Image to be displayed (Sized 860x700)',
        'id'   => $prefix . 'preview_image_4',
        'type' => 'file',
      ),
      array(
        'name' => 'Alternate Layout',
        'desc' => 'Check this if the group should use the alt layout',
        'id'   => $prefix . 'alt_layout_4',
        'type' => 'checkbox',
      ),
    ),
  );

  $meta_boxes[] = array(
    'id'         => 'theme-group-1',
    'title'      => 'Theme Page Group 1',
    'pages'      => array( 'page' ),
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        2691
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_1',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text',
        'id'   => $prefix . 'subheading_text_1',
        'type' => 'text',
      ),
      array(
        'name' => 'Body Text',
        'desc' => 'Enter the text to show in the group',
        'id'   => $prefix . 'body_text_1',
        'type' => 'textarea',
      ),
      array(
        'name' => 'Icon',
        'desc' => 'Icon Image to be displayed (Sized 150x150)',
        'id'   => $prefix . 'icon_image_1',
        'type' => 'file',
      ),
    )
  );

  $meta_boxes[] = array(
    'id'         => 'theme-group-2',
    'title'      => 'Theme Page Group 2',
    'pages'      => array( 'page' ),
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        2691
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_2',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text',
        'id'   => $prefix . 'subheading_text_2',
        'type' => 'text',
      ),
      array(
        'name' => 'Body Text',
        'desc' => 'Enter the text to show in the group',
        'id'   => $prefix . 'body_text_2',
        'type' => 'textarea',
      ),
      array(
        'name' => 'Icon',
        'desc' => 'Icon Image to be displayed (Sized 150x150)',
        'id'   => $prefix . 'icon_image_2',
        'type' => 'file',
      ),
    )
  );

  $meta_boxes[] = array(
    'id'         => 'theme-group-3',
    'title'      => 'Theme Page Group 3',
    'pages'      => array( 'page' ),
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        2691
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_3',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text',
        'id'   => $prefix . 'subheading_text_3',
        'type' => 'text',
      ),
      array(
        'name' => 'Body Text',
        'desc' => 'Enter the text to show in the group',
        'id'   => $prefix . 'body_text_3',
        'type' => 'textarea',
      ),
      array(
        'name' => 'Icon',
        'desc' => 'Icon Image to be displayed (Sized 150x150)',
        'id'   => $prefix . 'icon_image_3',
        'type' => 'file',
      ),
    )
  );

  $meta_boxes[] = array(
    'id'         => 'theme-group-4',
    'title'      => 'Theme Page Group 4',
    'pages'      => array( 'page' ),
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        2691
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_4',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text',
        'id'   => $prefix . 'subheading_text_4',
        'type' => 'text',
      ),
      array(
        'name' => 'Body Text',
        'desc' => 'Enter the text to show in the group',
        'id'   => $prefix . 'body_text_4',
        'type' => 'textarea',
      ),
      array(
        'name' => 'Icon',
        'desc' => 'Icon Image to be displayed (Sized 150x150)',
        'id'   => $prefix . 'icon_image_4',
        'type' => 'file',
      ),
    )
  );

  $meta_boxes[] = array(
    'id'         => 'theme-group-5',
    'title'      => 'Theme Page Group 5',
    'pages'      => array( 'page' ),
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        2691
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_5',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text',
        'id'   => $prefix . 'subheading_text_5',
        'type' => 'text',
      ),
      array(
        'name' => 'Body Text',
        'desc' => 'Enter the text to show in the group',
        'id'   => $prefix . 'body_text_5',
        'type' => 'textarea',
      ),
      array(
        'name' => 'Icon',
        'desc' => 'Icon Image to be displayed (Sized 150x150)',
        'id'   => $prefix . 'icon_image_5',
        'type' => 'file',
      ),
    )
  );

  $meta_boxes[] = array(
    'id'         => 'theme-group-6',
    'title'      => 'Theme Page Group 6',
    'pages'      => array( 'page' ),
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        2691
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_6',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text',
        'id'   => $prefix . 'subheading_text_6',
        'type' => 'text',
      ),
      array(
        'name' => 'Body Text',
        'desc' => 'Enter the text to show in the group',
        'id'   => $prefix . 'body_text_6',
        'type' => 'textarea',
      ),
      array(
        'name' => 'Icon',
        'desc' => 'Icon Image to be displayed (Sized 150x150)',
        'id'   => $prefix . 'icon_image_6',
        'type' => 'file',
      ),
    )
  );

  $meta_boxes[] = array(
    'id'         => 'theme-group-7',
    'title'      => 'Theme Page Group 7',
    'pages'      => array( 'page' ),
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        2691
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_7',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text',
        'id'   => $prefix . 'subheading_text_7',
        'type' => 'text',
      ),
      array(
        'name' => 'Body Text',
        'desc' => 'Enter the text to show in the group',
        'id'   => $prefix . 'body_text_7',
        'type' => 'textarea',
      ),
      array(
        'name' => 'Icon',
        'desc' => 'Icon Image to be displayed (Sized 150x150)',
        'id'   => $prefix . 'icon_image_7',
        'type' => 'file',
      ),
    )
  );

  $meta_boxes[] = array(
    'id'         => 'theme-group-8',
    'title'      => 'Theme Page Group 8',
    'pages'      => array( 'page' ),
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        2691
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_8',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text',
        'id'   => $prefix . 'subheading_text_8',
        'type' => 'text',
      ),
      array(
        'name' => 'Body Text',
        'desc' => 'Enter the text to show in the group',
        'id'   => $prefix . 'body_text_8',
        'type' => 'textarea',
      ),
      array(
        'name' => 'Icon',
        'desc' => 'Icon Image to be displayed (Sized 150x150)',
        'id'   => $prefix . 'icon_image_8',
        'type' => 'file',
      ),
    )
  );

  $meta_boxes[] = array(
    'id'         => 'theme-group-9',
    'title'      => 'Theme Page Group 9',
    'pages'      => array( 'page' ),
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        2691
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_9',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text',
        'id'   => $prefix . 'subheading_text_9',
        'type' => 'text',
      ),
      array(
        'name' => 'Body Text',
        'desc' => 'Enter the text to show in the group',
        'id'   => $prefix . 'body_text_9',
        'type' => 'textarea',
      ),
      array(
        'name' => 'Icon',
        'desc' => 'Icon Image to be displayed (Sized 150x150)',
        'id'   => $prefix . 'icon_image_9',
        'type' => 'file',
      ),
    )
  );

  $meta_boxes[] = array(
    'id'         => '360_group_1',
    'title'      => '360 Page Group 1',
    'pages'      => array( 'page', ), // Post type
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        2717
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_1',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text (only for alt layout)',
        'id'   => $prefix . 'subheading_text_1',
        'type' => 'text',
      ),
      array(
        'name' => 'Button Text',
        'desc' => 'Enter the text to show in the button',
        'id'   => $prefix . 'button_text_1',
        'type' => 'text',
      ),
      array(
        'name' => 'Button URL',
        'desc' => 'Enter the URL you want to link to',
        'id'   => $prefix . 'button_url_1',
        'type' => 'text',
      ),
      array(
        'name' => 'Preview Image',
        'desc' => 'Preview Image to be displayed (Sized 860x700)',
        'id'   => $prefix . 'preview_image_1',
        'type' => 'file',
      ),
      array(
        'name' => 'Alternate Layout',
        'desc' => 'Check this if the group should use the alt layout',
        'id'   => $prefix . 'alt_layout_1',
        'type' => 'checkbox',
      ),
    ),
  );

  $meta_boxes[] = array(
    'id'         => '360_group_2',
    'title'      => '360 Page Group 2',
    'pages'      => array( 'page', ), // Post type
    'show_on'    => array(
      'key'   => 'id',
      'value' => array(
        2717
      )
    ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => 'Heading Text',
        'desc' => 'Enter the heading text',
        'id'   => $prefix . 'heading_text_2',
        'type' => 'text',
      ),
      array(
        'name' => 'Sub-heading Text',
        'desc' => 'Enter the sub-heading text (only for alt layout)',
        'id'   => $prefix . 'subheading_text_2',
        'type' => 'text',
      ),
      array(
        'name' => 'Button Text',
        'desc' => 'Enter the text to show in the button',
        'id'   => $prefix . 'button_text_2',
        'type' => 'text',
      ),
      array(
        'name' => 'Button URL',
        'desc' => 'Enter the URL you want to link to',
        'id'   => $prefix . 'button_url_2',
        'type' => 'text',
      ),
      array(
        'name' => 'Preview Image',
        'desc' => 'Preview Image to be displayed (Sized 860x700)',
        'id'   => $prefix . 'preview_image_2',
        'type' => 'file',
      ),
      array(
        'name' => 'Alternate Layout',
        'desc' => 'Check this if the group should use the alt layout',
        'id'   => $prefix . 'alt_layout_2',
        'type' => 'checkbox',
      ),
    ),
  );


  /**
   * Add other metaboxes as needed
   */

  return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );


/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

  if ( ! class_exists( 'cmb_Meta_Box' ) ) {
    require_once 'init.php';
  }
}
