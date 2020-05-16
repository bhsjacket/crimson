<?php
$display = get_query_var('display-info');
$posts = explode(',', $display['posts']);

$args_query = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
	'posts_per_page' => 3,
	'nopaging' => true,
	'order' => 'DESC',
    'orderby' => 'none',
    'post__in' => $posts
);

$query = new WP_Query( $args_query );

if ( $query->have_posts() ) { ?>
<section class="specific-posts wider">
<?php while ( $query->have_posts() ) { $query->the_post(); ?>
    <a class="specific-post" href="<?php echo get_permalink(); ?>">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>">
        <h2 class="specific-headline"><?php echo get_the_title(); ?></h2>
    </a>
<?php } ?>
</section>
<?php } wp_reset_postdata(); ?>