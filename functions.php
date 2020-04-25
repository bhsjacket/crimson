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

// Featured Image
add_theme_support( 'post-thumbnails' );
// End Featured Image

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
function alx_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
    if ( !$crop ) return null; // let the wordpress default function handle this
 
    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
 
    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);
 
    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );
 
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'alx_thumbnail_upscale', 10, 6 );
// End Upscale Cropping

// Co-Authors Plus Capabilities
function cap_callback() {
    return 'read';
}
add_filter('coauthors_edit_author_cap', 'cap_callback');
// End Co-Authors Plus Capabilities

// Add Image Sizes
add_image_size( 'three-two', 1200, 800, true ); // 3:2 ratio
add_image_size( 'six-three', 1200, 600, true ); // 6:3 ratio
// End Add Image Sizes

// Title Tag
add_theme_support( 'title-tag' );
// End Title Tag

// Editor Styles
add_theme_support( 'editor-styles' );
add_editor_style( 'css/editor.css' );
add_editor_style( 'fonts/fonts.css' );
// End Editor Styles

// Include Shortcodes
include ('php/shortcodes/shortcode-functions.php');
// End Include Shortcodes

// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);
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

/* Register Custom Gutenberg Blocks
function register_acf_block_types() {

    // Register Custom Image Block
    acf_register_block_type(array(
        'name'              => 'jkt-wider-image',
        'title'             => __('Wider Image'),
        'description'       => __('Add a wider image inside your article.'),
        'render_template'   => 'php/posts/universal/content/wider-image.php',
        'category'          => 'common',
        'icon'              => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="m19 5v14h-14v-14h14m0-2h-14c-1.1 0-2 0.9-2 2v14c0 1.1 0.9 2 2 2h14c1.1 0 2-0.9 2-2v-14c0-1.1-0.9-2-2-2z"></path><path d="m14.14 11.86l-3 3.87-2.14-2.59-3 3.86h12l-3.86-5.14z"></path></svg>',
        'keywords'          => array( 'image', 'photo', 'wider', 'wider', 'figure' ),
        'supports'          => array(
            'align'         => false
        ),
        'align'             => 'full',
    ));
    acf_register_block_type(array(
        'name'              => 'jkt-image',
        'title'             => __('Image'),
        'description'       => __('Add an image inside your article.'),
        'render_template'   => 'php/posts/universal/content/image.php',
        'category'          => 'common',
        'icon'              => '<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="m19 5v14h-14v-14h14m0-2h-14c-1.1 0-2 0.9-2 2v14c0 1.1 0.9 2 2 2h14c1.1 0 2-0.9 2-2v-14c0-1.1-0.9-2-2-2z"></path><path d="m14.14 11.86l-3 3.87-2.14-2.59-3 3.86h12l-3.86-5.14z"></path></svg>',
        'keywords'          => array( 'image', 'photo', 'figure' ),
        'supports'          => array(
            'align'         => false
        ),
        'align'             => 'full',
    ));
}

if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}
End Register Custom Gutenberg Blocks */

// Hide Unwanted Blocks
add_filter( 'allowed_block_types', 'misha_keep_plugins_blocks' );
 
function misha_keep_plugins_blocks( $allowed_blocks ) {
 
	$registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
 
	unset( $registered_blocks[ 'core/latest-comments' ] );
	unset( $registered_blocks[ 'core/archives' ] );
    unset( $registered_blocks[ 'core/calendar' ] );
    unset( $registered_blocks[ 'core/categories' ] );
    unset( $registered_blocks[ 'core/rss' ] );
    unset( $registered_blocks[ 'core/latest-posts' ] );
    unset( $registered_blocks[ 'core/search' ] );
    unset( $registered_blocks[ 'core/tag-cloud' ] );
 
	$registered_blocks = array_keys( $registered_blocks );
 
	return array_merge( array(
		'core/paragraph',
		'core/quote',
        'core/freeform',
        'core/separator',
        'core/shortcode',
        'core-embed/twitter',
        'core-embed/youtube',
        'core-embed/facebook',
        'core-embed/instagram',
        'core-embed/soundcloud',
        'core-embed/spotify',
        'core-embed/vimeo',
        'core-embed/reddit',
        'core-embed/tumblr',
        'core-embed/youtube',
	), $registered_blocks );
 
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

// Trim String
function trimstring($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}
// End Trim String

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
		'hierarchical' => false,
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

// Add Crossword Post Type
// Register Custom Post Type
function crimson_crossword() {

	$labels = array(
		'name'                  => _x( 'Crosswords', 'Post Type General Name', 'crimson' ),
		'singular_name'         => _x( 'Crossword', 'Post Type Singular Name', 'crimson' ),
		'menu_name'             => __( 'Crosswords', 'crimson' ),
		'name_admin_bar'        => __( 'Crossword', 'crimson' ),
		'archives'              => __( 'Crossword Archives', 'crimson' ),
		'attributes'            => __( 'Crossword Attributes', 'crimson' ),
		'parent_item_colon'     => __( 'Parent Crossword:', 'crimson' ),
		'all_items'             => __( 'All Crossword', 'crimson' ),
		'add_new_item'          => __( 'Add New Crossword', 'crimson' ),
		'add_new'               => __( 'Add New', 'crimson' ),
		'new_item'              => __( 'New Crossword', 'crimson' ),
		'edit_item'             => __( 'Edit Crossword', 'crimson' ),
		'update_item'           => __( 'Update Crossword', 'crimson' ),
		'view_item'             => __( 'View Crossword', 'crimson' ),
		'view_items'            => __( 'View Crosswords', 'crimson' ),
		'search_items'          => __( 'Search Crossword', 'crimson' ),
		'not_found'             => __( 'No crosswords found', 'crimson' ),
		'not_found_in_trash'    => __( 'No crosswords in Trash', 'crimson' ),
		'featured_image'        => __( 'Featured Image', 'crimson' ),
		'set_featured_image'    => __( 'Set featured image', 'crimson' ),
		'remove_featured_image' => __( 'Remove featured image', 'crimson' ),
		'use_featured_image'    => __( 'Use as featured image', 'crimson' ),
		'insert_into_item'      => __( 'Insert into crossword', 'crimson' ),
		'uploaded_to_this_item' => __( 'Uploaded to this crossword', 'crimson' ),
		'items_list'            => __( 'Crossword list', 'crimson' ),
		'items_list_navigation' => __( 'Crossword list navigation', 'crimson' ),
		'filter_items_list'     => __( 'Filter crossword list', 'crimson' ),
	);
	$args = array(
		'label'                 => __( 'Crossword', 'crimson' ),
		'description'           => __( 'Crosswords', 'crimson' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'custom-fields' ),
		'taxonomies'            => array( 'issue' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => 'dashicons-grid-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'crossword', $args );

}
add_action( 'init', 'crimson_crossword', 0 );
// End Add Crossword Post Type