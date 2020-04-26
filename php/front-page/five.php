<?php
$display = get_query_var('display-info');

if(empty($display['offset'])) {
    $offset = 0;
} else {
    $offset = $display['offset'];
}

$args = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => $display['category'],
    'posts_per_page' => $display['posts'],
    'offset' => $offset,
    'meta_key' => '_thumbnail_id',
);

$query = new WP_Query( $args ); ?>

<section class="five">

<?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>

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
            <p><?php if(!empty(get_field('homepage_excerpt'))) { echo get_field('homepage_excerpt'); } else { echo wp_trim_excerpt(); } ?></p>
        </div>
    </a>
    
<?php }} wp_reset_postdata(); ?>
    
</section>