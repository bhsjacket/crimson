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
 */
?>

<?php get_header(); ?>
<?php if(get_field('big_header', 'option') == 'enabled') { ?>
<?php get_template_part('php/front-page/big-header'); ?>
<?php } ?>

<main id="front-page">
<?php

set_query_var('display-info', 'news,0,#e7e7e7,#000000,4');
get_template_part('php/front-page/four');

set_query_var('display-info', 'news,0,#800000,#ffffff,true');
get_template_part('php/front-page/one3');

?>
</main>

<?php get_footer(); ?>