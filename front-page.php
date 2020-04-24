<?php get_header(); ?>
<?php if(get_field('big_header', 'option') == 'enabled') { ?>
<?php get_template_part('php/front-page/big-header'); ?>
<?php } ?>

<?php
/**
 * SLIDER ---------------
 * category - category slug
 * offset - number
 * background-color - HEX color value
 * text-color - HEX color value
 * pattern - CSS class from styles.css, background pattern section
 * posts-position - bottom/top
 * full-width - true/false
 * image-size - preset size, optional
 * 
 * TOP STORY ------------
 * front-feature - true/false, overrides category
 * category - category slug
 * offset - number
 * background-color - HEX color value
 * text-color - HEX color value
 * pattern - CSS class from styles.css, background pattern section
 * image-position - right/left
 * align - top/bottom
 * 
 * FIVE POST GRID -------
 * category - category slug
 * offset - number
 * posts - number, multiple of 5 recommended
 * 
 * TITLE ----------------
 * title - string
 * url - URL
 * icon - fontawesome icon class
 * icon-color: HEX color value
 * text-color: HEX color value
 */
?>

<main id="front-page">
<?php
set_query_var('display-info', array(
    'front-feature' => true,
    'category' => 'city', // category slug (required)
    'offset' => 0, // number (optional)
    'background-color' => '#800000', // HEX color value (required)
    'text-color' => '#FFFFFF', // HEX color value (required)
    'pattern' => 'sports-dark animated_xy', // plus, plus-dark, squiggle, squiggle-dark, tic-tac-toe, tic-tac-toe-dark, rain, rain-dark, shapes, shapes-dark, texture, texture-dark, food, food-dark, magnet, magnet-dark, squares, squares-dark (optional)
    'image-position' => 'right', // left, right (required)
    'align' => 'bottom' // top, bottom (required)
));
get_template_part('php/front-page/top-story');
?>

<?php
get_template_part('php/front-page/columnists');
?>

<?php
set_query_var('display-info', array(
    'category' => 'news', // category slug (required)
    'offset' => 0, // number (optional)
    'background-color' => '#800000', // HEX color value (required)
    'text-color' => '#FFFFFF', // HEX color value (required)
    'pattern' => 'plus', // plus, plus-dark, squiggle, squiggle-dark, tic-tac-toe, tic-tac-toe-dark, rain, rain-dark, shapes, shapes-dark, texture, texture-dark, food, food-dark, magnet, magnet-dark, squares, squares-dark (optional)
    'posts-position' => 'bottom', // top, bottom (required)
    'full-width' => false,
    'image-size' => 'six-three',
));
get_template_part('php/front-page/slider');
?>

<?php
set_query_var('display-info', array(
    'category' => 'opinion', // category slug
    'offset' => 1, // number
    'posts' => 5 // number, multiple of 5
));
get_template_part('php/front-page/five');
?>
<?php
set_query_var('display-info', array(
    'title' => 'Opinion', // category slug
    'url' => '/category/opinion', // number
    'icon' => 'far fa-comments', // number, multiple of 5
    'icon-color' => '#800000',
    'text-color' => '#000000'
));
get_template_part('php/front-page/title');
?>
<?php
set_query_var('display-info', array(
    'front-feature' => false,
    'category' => 'opinion', // category slug (required)
    'offset' => 0, // number (optional)
    'background-color' => '#000000', // HEX color value (required)
    'text-color' => '#FFFFFF', // HEX color value (required)
    'pattern' => 'comment-bubble animated_xy', // plus, plus-dark, squiggle, squiggle-dark, tic-tac-toe, tic-tac-toe-dark, rain, rain-dark, shapes, shapes-dark, texture, texture-dark, food, food-dark, magnet, magnet-dark, squares, squares-dark (optional)
    'image-position' => 'left', // left, right (required)
    'align' => 'top' // top, bottom (required)
));
get_template_part('php/front-page/top-story');
?>
</main>

<?php get_footer(); ?>