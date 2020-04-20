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
);

$query = new WP_Query( $args ); ?>

<section class="four">
<?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>
<a class="four-post" href="<?php echo get_permalink(); ?>" style="<?php if($display['border'] !== false) { ?> box-shadow: inset 0px <?php if($display['border']['position'] == 'bottom') { echo '-'; }; ?>5px 0px 0px <?php echo $display['border']['color']; ?>; <?php if($display['border']['position'] == 'top') { echo 'padding-top: 5px;'; }; ?> <?php } ?>background-color: <?php echo $display['background-color']; ?>">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>">
        <div class="four-post-bottom">
            <h2 style="color: <?php echo $display['text-color']; ?>"><?php echo get_the_title(); ?></h2>
            <p style="color: <?php echo $display['text-color']; ?>"><?php echo get_the_author_meta('display_name'); ?></p>
        </div>
    </a>
<?php }} wp_reset_postdata(); ?>
</section>