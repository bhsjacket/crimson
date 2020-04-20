<?php
/**
 * ----------------------------------------
 * ONE3 POST LAYOUT SETTINGS:
 * Example:
 * <?php set_query_var('display-info', 'news,0,#800000,#ffffff,false');
 * get_template_part('php/front-page/one2/one2-right'); ?>
 * Settings:
 * - category slug (required)
 * --- string
 * - offset (required)
 * --- number
 * - background color (required)
 * --- CSS color value
 * - text color (required)
 * --- CSS color value
 * - show image on 3 posts (required)
 * --- true/false
 * - large image position (required)
 * --- left/right
 * ALL SETTINGS ARE REQUIRED!
 * ----------------------------------------
 * FOUR POSTS LAYOUT SETTINGS:
 * Example:
 * <?php set_query_var('display-info', 'news,0,#800000,#ffffff');
 * get_template_part('php/front-page/four'); ?>
 * Settings:
 * - category slug (required)
 * --- string
 * - offset (required)
 * --- number
 * - background color (required)
 * --- CSS color value
 * - text color (required)
 * --- CSS color value
 * - number of posts (required)
 * --- number, multiple of 4
 * ALL SETTINGS ARE REQUIRED!
 * ----------------------------------------
 * HEADING:
 * Example:
 * set_query_var('display-info', array(
 *  'title' => 'News',
 *  'background-color' => '#e7e7e7',
 *  'text-color' => '#000000',
 *  'alignment' => 'center',
 *  'border' => array(
 *      'color' => '#800000',
 *      'position' => 'top'
 *  )
 * ));
 * ----------------------------------------
 */
?>

<?php get_header(); ?>
<?php if(get_field('big_header', 'option') == 'enabled') { ?>
<?php get_template_part('php/front-page/big-header'); ?>
<?php } ?>

<main id="front-page">
<?php
set_query_var('display-info', array(
    'category' => 'news',
    'offset' => 0,
    'background-color' => '#e7e7e7',
    'text-color' => '#000000',
    'alignment' => 'center',
    'pattern' => 'plus', // plus, plus-dark, squiggle, squiggle-dark, tic-tac-toe, tic-tac-toe-dark, rain, rain-dark, shapes, shapes-dark
    'image-position' => 'right',
));
get_template_part('php/front-page/top-story');

set_query_var('display-info', array(
    'title' => 'News',
    'background-color' => '#e7e7e7',
    'text-color' => '#000000',
    'alignment' => 'center',
    'border' => array(
        'color' => '#800000',
        'position' => 'top'
    )
));
get_template_part('php/front-page/header');

set_query_var('display-info', array(
    'category' => 'news',
    'offset' => 0,
    'background-color' => '#e7e7e7',
    'text-color' => '#000000',
    'posts' => 4,
    'border' => array(
        'position' => 'bottom',
        'color' => '#800000',
    ),
));
get_template_part('php/front-page/four');

set_query_var('display-info', array(
    'category' => 'news',
    'offset' => 0,
    'background-color' => '#e7e7e7',
    'text-color' => '#000000',
    'image-position' => 'right',
    'display-image' => false,
    'border' => array(
        'position' => 'bottom',
        'color' => '#800000',
    ),
));
get_template_part('php/front-page/one3');

set_query_var('display-info', array(
    'category' => 'news',
    'offset' => 0,
    'background-color' => '#ffe500',
    'text-color' => '#000000',
    'posts' => 4,
    'border' => array(
        'position' => 'top',
        'color' => '#800000',
    ),
));
get_template_part('php/front-page/four');

set_query_var('display-info', array(
    'category' => 'news',
    'offset' => 0,
    'background-color' => '#ffe500',
    'text-color' => '#000000',
    'posts' => 4,
    'border' => array(
        'position' => 'top',
        'color' => '#800000',
    ),
));
get_template_part('php/front-page/four');
?>
</main>

<?php get_footer(); ?>