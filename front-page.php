<?php
/**
 * ----------------------------------------
 * ONE3 POST LAYOUT SETTINGS:
 * Example:
 * <?php set_query_var('display-info', 'news,0,#800000,#ffffff,false');
 * get_template_part('php/front-page/one2'); ?>
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
 * - wider (required)
 * --- true/false
 * ALL SETTINGS ARE REQUIRED!
 * ----------------------------------------
 */
?>

<?php get_header(); ?>
<?php if(get_field('big_header', 'option') == 'enabled') { ?>
<?php get_template_part('php/front-page/big-header'); ?>
<?php } ?>

<main id="front-page">
    <?php // get_template_part('php/front-page/f2f-top'); ?>
    <?php set_query_var('display-info', 'news,0,#e7e7e7,#000000,true,false');
    get_template_part('php/front-page/one3/one3-right'); ?>
    <?php set_query_var('display-info', 'sports,0,#004E45,#ffffff,true,true');
    get_template_part('php/front-page/one3/one3-left'); ?>
</main>

<?php get_footer(); ?>