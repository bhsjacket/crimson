<?php
$args_query = array(
    'post__not_in' => array($post->ID),
    'post_type' => array('post'),
    'post_status' => array('publish'),
    'category_name' => get_the_category()[0]->name,
    'posts_per_page' => 3,
    'offset' => $offset,
);

$query = new WP_Query( $args_query );

if ( $query->have_posts() ) { ?>
<div class="recommended-posts">
<?php while ( $query->have_posts() ) { $query->the_post(); ?>

    <div class="recommended-post">
        <div class="recommended-title">
            <a class="title" href="<?php echo get_permalink(); ?>"><h3><?php echo get_the_title(); ?></h3></a>
            <a class="date" href="<?php echo get_permalink(); ?>"><span class="date"><?php echo get_the_date('F j, Y'); ?></span></a>
        </div>
        <a href="<?php echo get_permalink(); ?>"><img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'three-two')[0]; ?>"></a>
    </div>

<?php } ?>
</div>
<?php } wp_reset_postdata(); ?>