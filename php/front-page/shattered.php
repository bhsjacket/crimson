<?php

$display = get_query_var('display-info');

if(empty($display['offset'])) {
    $offset = 0;
} else {
    $offset = $display['offset'];
}

$image_args = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => $display['category'],
    'posts_per_page' => 3,
    'offset' => $offset,
    'meta_key' => '_thumbnail_id',
);

$image_query = new WP_Query( $image_args );

$args = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => $display['category'],
    'posts_per_page' => 6,
    'offset' => $offset + 3,
);

$query = new WP_Query( $args ); ?>

<section class="shattered">

<?php if ( $image_query->have_posts() ) { while ( $image_query->have_posts() ) { $image_query->the_post(); ?>

<a href="<?php echo get_permalink(); ?>" class="shattered-featured-image <?php echo $display['pattern'] ?>" style="background-color: <?php echo $display['background-color'] ?>">
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>">
    <div class="shattered-featured-image-info">
        <h2 style="color: <?php echo $display['text-color'] ?>"><?php echo get_the_title(); ?></h2>
        <span style="color: <?php echo $display['text-color'] ?>" class="shattered-byline">By <?php echo get_the_author_meta('display_name'); ?></span>
    </div>
</a>

<?php }} wp_reset_postdata(); ?>


<?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>

<a href="<?php echo get_permalink(); ?>" class="shattered-post <?php echo $display['pattern'] ?>" style="background-color: <?php echo $display['background-color'] ?>">
    <h2 style="color: <?php echo $display['text-color'] ?>"><?php echo get_the_title(); ?></h2>
</a>

<?php }} wp_reset_postdata(); ?>

</section>