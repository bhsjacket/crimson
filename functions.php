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


// Add 3:2 Image Size
add_image_size( 'three-two', 1200, 800, true );
// End Add 3:2 Image Size

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

function remove_user_fields()
{
    echo '<style>tr.user-url-wrap, tr.user-syntax-highlighting-wrap, tr.user-rich-editing-wrap, tr.user-comment-shortcuts-wrap, tr.user-profile-picture, .user-description-wrap .description, #profile-page h2, #color-picker > div:nth-child(n+5), #screen-meta-links{ display: none; }</style>';
}
add_action( 'admin_head-user-edit.php', 'remove_user_fields' );
add_action( 'admin_head-profile.php',   'remove_user_fields' );
// End User Contact Methods