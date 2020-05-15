<?php
if(empty(get_field('post_template'))) {
    $template = 'single';
} else {
    $template = get_field('post_template');
}

if(empty(get_field('additional_options'))) {
    $options = array();
} else {
    $options = get_field('additional_options');
}
?>

<?php if($template !== 'slideshow' && $template !== 'gallery') { ?>

<?php get_header(); ?>

<header id="article-header">
    <?php if( $template == 'massive' ) { ?>
        <?php get_template_part('php/posts/massive/featured-image'); ?>
    <?php } ?>
    <?php get_template_part('php/posts/universal/header'); ?>
    <?php if( in_array( $template, array('single', 'slider', 'video', 'wider', 'widest') ) ) { ?>
        <?php if(!in_array('hide_image', $options)) { ?>
        <?php get_template_part('php/posts/' . get_field('post_template') . '/featured-image'); // Get featured image based on theme folder?>
        <?php } ?>
    <?php } ?>
</header>

<?php get_template_part('php/posts/universal/content'); ?>
<?php get_template_part('php/posts/universal/footer'); ?>
<?php get_template_part('php/posts/universal/comments'); ?>

<?php get_footer(); ?>

<?php } ?>

<?php
if($template == 'slideshow') {
    get_template_part('load/head');
    get_template_part('php/posts/slideshow/slideshow');
    get_template_part('load/footer');
}
?>