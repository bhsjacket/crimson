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
    'posts_per_page' => 1,
    'offset' => $offset,
);

$query = new WP_Query( $args ); ?>

<section style="background-color: <?php echo $display['background-color']; ?>" class="top-story full-width <?php echo $display['pattern']; ?> <?php echo $display['image-position']; ?>">

<?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>

    <a href="">
        <div class="top-story-inner contain">
            <div class="top-story-headline">
                <h2 style="color: <?php echo $display['text-color']; ?>"><?php echo get_the_title(); ?></h2>
                <span style="color: <?php echo $display['text-color']; ?>">By <?php echo get_the_author_meta('display_name'); ?> in <?php echo get_the_category()[0]->name; ?></span>
            </div>
            <div class="top-story-image">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>">
            </div>
        </div>
    </a>

<?php }} wp_reset_postdata(); ?>

</section>