<?php /**
 * Copyright Jerome Paulos, All Rights Reserved.
 * 
 * This theme, nor any part, may not be used outside of the Berkeley
 * High Jacket without the express permission of Jerome Paulos.
 * 
 * It may be used within the Jacket for free and forever.
 * 
 * Contact: https://jeromepaulos.com/
 * 
 * Developed in March-April 2020 by Jerome Paulos (10th Grade) with
 * PHP, HTML, CSS, JavaScript, and a few libraries: Swiper.js and jQuery.
 * 
 * This theme is dependent on the following plugins: Advanced Custom Fields PRO,
 * Advanced Custom Fields Extended, ACF Enhanced Message Field, Shortcodes Ultimate,
 * Shortcodes Ultimate: Shortcode Creator, Co-Authors Plus, possibly more.
 * 
 * Disabling them will likely break EVERYTHING. Copies of these plugins, as well
 * as some other important plugins, should be included with this theme, just in case.
 */ ?>

<?php

function init_actions() {
    add_theme_support( 'post-thumbnails' ); // Featured Image

    add_theme_support( 'title-tag' );

    add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor.css' );
	add_editor_style( 'css/classic-editor.css' );
	add_editor_style( 'fonts/fonts.css' );

	add_theme_support( 'align-wide' );
	
	add_theme_support( 'automatic-feed-links' ); // RSS Feeds

    add_image_size( 'three-two', 1200, 800, true ); // 3:2 ratio
	add_image_size( 'six-three', 1200, 600, true ); // 6:3 ratio
	add_image_size( 'reasonable', 900 ); // 900px width
	
	remove_image_size('1536x1536');
	remove_image_size('2048x2048');
}
add_action( 'after_setup_theme', 'init_actions' );

// Admin CSS & JS
function load_admin_style() {
	wp_register_style( 'admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
	wp_enqueue_style( 'admin_css');

	wp_register_script( 'admin_js', get_template_directory_uri() . '/admin.js', false, '1.0.0' );
	wp_enqueue_script( 'admin_js');
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );
// End Admin CSS & JS

// Modify Excerpts
function crimson_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'crimson_excerpt_length');
function crimson_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'crimson_excerpt_more' );
// End Modify Excerpts

// Upscale Cropping
function crimson_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
    if ( !$crop ) return null; // let the wordpress default function handle this
 
    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
 
    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);
 
    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );
 
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'crimson_thumbnail_upscale', 10, 6 );
// End Upscale Cropping

// Co-Authors Plus Capabilities
function cap_callback() {
    return 'read'; // Add all users to dropdown
}
add_filter('coauthors_edit_author_cap', 'cap_callback');
// End Co-Authors Plus Capabilities

// Include Shortcodes
include ('php/shortcodes/shortcode-functions.php');
// End Include Shortcodes

// Disable Gutenberg
function disable_gutenberg($is_enabled, $post_type) {
	if ($post_type !== 'post') return false;
	return $is_enabled;
}
add_filter('use_block_editor_for_post_type', 'disable_gutenberg', 10, 2);

function disable_editor_fullscreen_by_default() {
	$script = "window.onload = function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } }";
	wp_add_inline_script( 'wp-blocks', $script );
}
add_action( 'enqueue_block_editor_assets', 'disable_editor_fullscreen_by_default' );
// End Disable Gutenberg

// Register Menus
function crimson_menus() {

	$locations = array(
		'sections' => __( 'Sections', 'crimson' ),
		'secondary' => __( 'Secondary', 'crimson' ),
        'tertiary' => __( 'Tertiary', 'crimson' ),
        'columnists' => __('Columnists', 'crimson'),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'crimson_menus' );
// End Register Menus

// Hide Unwanted Blocks
add_filter( 'allowed_block_types', 'misha_allowed_block_types' );
 
function misha_allowed_block_types( $allowed_blocks ) {
 
	return array(
		'core/paragraph',
		'core/heading',
		'core/list',
		'acf/extended-image',
		'acf/embed',
		'core/quote',
		'acf/image-gallery',
		'core-embed/twitter',
		'core-embed/facebook',
		'core-embed/youtube',
		'core-embed/vimeo',
		'core-embed/spotify',
		'core-embed/soundcloud',
		'core-embed/reddit',
		'core-embed/instagram',
		'acf/advertisement'
	);
 
}
// End Hide Unwated Blocks

// Register Syndication Taxonomy
add_action( 'init', 'create_syndication_taxonomy', 0 );
 
function create_syndication_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Syndication Options', 'taxonomy general names' ),
    'singular_name' => _x( 'Syndication Option', 'taxonomy singular names' ),
    'search_items' =>  __( 'Search Syndication Options' ),
    'all_items' => __( 'All Syndication Options' ),
    'parent_item' => __( 'Parent Syndication Option' ),
    'parent_item_colon' => __( 'Parent Syndication Option:' ),
    'edit_item' => __( 'Edit Syndication Option' ), 
    'update_item' => __( 'Update Syndication Option' ),
    'add_new_item' => __( 'Add New Syndication Option' ),
    'new_item_name' => __( 'New Syndication Option Name' ),
    'menu_name' => __( 'Syndication Options' ),
  );    
 
  register_taxonomy('syndication',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => false,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'crimson-syndication' ),
  ));
 
}
// End Register Syndication Taxonomy

// User Contact Methods
function modify_user_contact_methods( $user_contact ) {

	$user_contact['twitter']   = __( 'Twitter Username (no @)', 'crimson' );
	$user_contact['instagram']   = __( 'Instagram Username (no @)', 'crimson' );
	$user_contact['facebook']   = __( 'Facebook URL (with https://)', 'crimson' );

	unset( $user_contact['aim'] );
	unset( $user_contact['yim'] );
    unset( $user_contact['jabber'] );

	return $user_contact;

}
add_filter( 'user_contactmethods', 'modify_user_contact_methods' );

function remove_user_fields() {
    echo '<style>tr.user-syntax-highlighting-wrap, tr.user-rich-editing-wrap, tr.user-comment-shortcuts-wrap, tr.user-profile-picture, .user-description-wrap .description, #profile-page h2, #color-picker > div:nth-child(n+5), #screen-meta-links{ display: none; }</style>';
}
add_action( 'admin_head-user-edit.php', 'remove_user_fields' );
add_action( 'admin_head-profile.php',   'remove_user_fields' );
// End User Contact Methods

// Columns
function crimson_columns() {

	$labels = array(
		'name'                  => _x( 'Columns', 'Post Type General Name', 'crimson' ),
		'singular_name'         => _x( 'Column', 'Post Type Singular Name', 'crimson' ),
		'menu_name'             => __( 'Columns', 'crimson' ),
		'name_admin_bar'        => __( 'Column', 'crimson' ),
		'archives'              => __( 'Column Archives', 'crimson' ),
		'attributes'            => __( 'Column Attributes', 'crimson' ),
		'parent_item_colon'     => __( 'Parent Column:', 'crimson' ),
		'all_items'             => __( 'All Columns', 'crimson' ),
		'add_new_item'          => __( 'Add New Column', 'crimson' ),
		'add_new'               => __( 'Add New', 'crimson' ),
		'new_item'              => __( 'New Column', 'crimson' ),
		'edit_item'             => __( 'Edit Column', 'crimson' ),
		'update_item'           => __( 'Update Column', 'crimson' ),
		'view_item'             => __( 'View Column', 'crimson' ),
		'view_items'            => __( 'View Columns', 'crimson' ),
		'search_items'          => __( 'Search Column', 'crimson' ),
		'not_found'             => __( 'Not found', 'crimson' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'crimson' ),
		'featured_image'        => __( 'Featured Image', 'crimson' ),
		'set_featured_image'    => __( 'Set featured image', 'crimson' ),
		'remove_featured_image' => __( 'Remove featured image', 'crimson' ),
		'use_featured_image'    => __( 'Use as featured image', 'crimson' ),
		'insert_into_item'      => __( 'Insert into column', 'crimson' ),
		'uploaded_to_this_item' => __( 'Uploaded to this column', 'crimson' ),
		'items_list'            => __( 'Column list', 'crimson' ),
		'items_list_navigation' => __( 'Column list navigation', 'crimson' ),
		'filter_items_list'     => __( 'Filter column list', 'crimson' ),
	);
	$args = array(
		'label'                 => __( 'Column', 'crimson' ),
		'description'           => __( 'Columns', 'crimson' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields', 'author' ),
		'taxonomies'            => array( 'columnist' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-comments',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'column',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'column', $args );

}
add_action( 'init', 'crimson_columns', 0 );
// End Columns

// Add Issue Taxonomy
// Register Taxonomy Issue
function create_issue_tax() {

	$labels = array(
		'name'              => _x( 'Issues', 'taxonomy general name', 'crimson' ),
		'singular_name'     => _x( 'Issue', 'taxonomy singular name', 'crimson' ),
		'search_items'      => __( 'Search Issues', 'crimson' ),
		'all_items'         => __( 'All Issues', 'crimson' ),
		'parent_item'       => __( 'Parent Issue', 'crimson' ),
		'parent_item_colon' => __( 'Parent Issue:', 'crimson' ),
		'edit_item'         => __( 'Edit Issue', 'crimson' ),
		'update_item'       => __( 'Update Issue', 'crimson' ),
		'add_new_item'      => __( 'Add New Issue', 'crimson' ),
		'new_item_name'     => __( 'New Issue Name', 'crimson' ),
		'menu_name'         => __( 'Issue', 'crimson' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( '', 'crimson' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'show_tagcloud' => false,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'rewrite' => false,
	);
	register_taxonomy( 'issue', array('post', 'column'), $args );

}
add_action( 'init', 'create_issue_tax' );
// End Add Issue Taxonomy

// Add Admin CSS
add_action('admin_head', 'crimson_admin_css');

function crimson_admin_css() {
  echo '<style>
		[data-slug="admin-menu-editor-pro"] + .plugin-update-tr {
			display: none;
		}
  </style>';
}
// End Add Admin CSS