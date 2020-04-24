<?php get_header(); ?>
<div class="archive-title">
    <h2><?php echo get_the_category()[0]->name; ?></h2>
</div>
<main id="archive">
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<a href="<?php echo get_permalink(); ?>">
    <div class="five-post">
        <?php if(!empty(get_the_post_thumbnail_url(get_the_ID(), 'three-two'))) { ?>
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>">
        <?php } ?>
        <h2 style="<?php if(empty(get_the_post_thumbnail_url(get_the_ID(), 'three-two'))) { echo 'margin-top: 0;'; } ?>"><?php echo get_the_title(); ?></h2>
        <?php  ?>
        <?php if(empty(get_the_post_thumbnail_url(get_the_ID(), 'three-two'))) {
            $string_length = 450;
        } else {
            $string_length = 200;
        } ?>
        <p><?php if(!empty(get_field('homepage_excerpt'))) { echo get_field('homepage_excerpt'); } else { echo trimstring(wp_trim_excerpt(), $string_length); } ?></p>
    </div>
</a>
<?php endwhile; ?>
<?php else: ?>
<p class="no-results">No posts found.</p>
<?php endif; ?>
</main>
<div class="archive-pagination">
    <?php the_posts_navigation(array(
        'prev_text' => '<i class="far fa-chevron-left"></i> Older Articles',
        'next_text' => 'Newer Articles <i class="far fa-chevron-right"></i>',
    )); ?>
</div>
<?php get_footer(); ?>