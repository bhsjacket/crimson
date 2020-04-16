<?php get_header(); ?>
<?php if (have_posts()) : ?>
<main id="page">
    <?php while (have_posts()) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <?php the_post_thumbnail(); ?>
    <?php the_content($post->ID); ?>
<?php endwhile; ?>
</main>
<?php endif; ?>
<?php get_footer(); ?>