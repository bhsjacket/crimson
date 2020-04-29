<?php $template = get_field('post_template'); ?>

<?php if($template !== 'slideshow' && $template !== 'gallery') { ?>

<?php get_header(); ?>

<header id="article-header">
    <?php if( $template == 'massive' ) { ?>
        <?php get_template_part('php/posts/massive/featured-image'); ?>
    <?php } ?>
    <?php get_template_part('php/posts/universal/header'); ?>
    <?php if( in_array( $template, array('single', 'slider', 'video') ) ) { ?>
        <?php get_template_part('php/posts/' . get_field('post_template') . '/featured-image'); // Get featured image based on theme folder?>
    <?php } ?>
</header>

<?php get_template_part('php/posts/universal/content'); ?>

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

<?php
if($template == 'gallery') {
    get_header();
?>
<header id="article-header">
    <?php get_template_part('php/posts/universal/header'); ?>
</header>
<main class="article-content gallery-post">
<?php get_template_part('php/posts/gallery/gallery'); ?>
</main>
<?php
    get_template_part('php/posts/universal/comments');
    get_footer();
}
?>