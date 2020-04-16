<?php get_header(); ?>
<?php if(get_field('big_header', 'option') == 'enabled') { ?>
<?php get_template_part('php/front-page/big-header'); ?>
<?php } ?>

<main id="front-page">
    <?php get_template_part('php/front-page/f2f-top'); ?>
</main>

<?php get_footer(); ?>