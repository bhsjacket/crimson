<?php
$category = explode(",", get_query_var('display-info'))[0];
$offset = explode(",", get_query_var('display-info'))[1];
$bg_color = explode(",", get_query_var('display-info'))[2];
$text_color = explode(",", get_query_var('display-info'))[3];
$number = explode(",", get_query_var('display-info'))[4];

$args = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => $category,
    'posts_per_page' => $number,
    'offset' => $offset,
);

$query = new WP_Query( $args ); ?>

<section class="four">
<?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>
    <a class="four-post" href="<?php echo get_permalink(); ?>" style="background-color: <?php echo $bg_color; ?>">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>">
        <div class="four-post-bottom">
            <h2 style="color: <?php echo $text_color; ?>"><?php echo get_the_title(); ?></h2>
            <p style="color: <?php echo $text_color; ?>"><?php echo get_the_author_meta('display_name'); ?></p>
        </div>
    </a>
<?php }} wp_reset_postdata(); ?>
</section>