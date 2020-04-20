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
    'posts_per_page' => 3,
    'offset' => $offset,
    'meta_key' => '_thumbnail_id',
);

$query = new WP_Query( $args );

$image_args = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => $display['category'],
    'posts_per_page' => 1,
    'offset' => $offset + 3,
);

$image_query = new WP_Query( $image_args ); ?>

<section class="one3">

<?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>

<a href="<?php echo get_permalink(); ?>" class="one3-post" style="<?php if($display['border'] !== false) { ?> box-shadow: inset 0px <?php } if($display['border']['position'] == 'bottom') { echo '-'; }; ?>5px 0px 0px <?php echo $display['border']['color']; ?>; <?php if($display['border']['position'] == 'top') { echo 'padding-top: 17.5px;'; }; ?><?php if($display['display-image'] == 'true' && $width !== 'true') { ?>background: linear-gradient(to right, <?php echo $display['background-color']; ?> 60%, rgb(0,0,0,0) 80%), url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>'), <?php echo $display['background-color']; ?>; background-size: contain; background-position: right; background-repeat: no-repeat;<?php } ?>background-color: <?php echo $display['background-color']; ?>">
        <h2 style="<?php if($display['display-image'] == false) { echo 'max-width: none!important;'; }; ?> color: <?php echo $display['text-color']; ?>"><?php echo get_the_title(); ?></h2>
        <p style="color: <?php echo $display['text-color']; ?>"><?php echo get_the_author_meta('display_name'); ?> in <?php echo get_the_category()[0]->name; ?></p>
    </a>

<?php }} wp_reset_postdata(); ?>


<?php if ( $image_query->have_posts() ) { while ( $image_query->have_posts() ) { $image_query->the_post(); ?>

<a href="<?php echo get_permalink(); ?>" class="one3-<?php echo $display['image-position']; ?> one3-image" style="background-color: <?php echo $display['background-color']; ?>">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>">
        <h2 class="one3-image-title" style="<?php if($display['border'] !== false && $display['border']['position'] == 'bottom') { ?> box-shadow: inset 0px -5px 0px 0px <?php echo $display['border']['color']; ?>;<?php } ?> color: <?php echo $display['text-color']; ?>; background-color: <?php echo $display['background-color']; ?>;"><?php echo get_the_title(); ?></h2>
    </a>

<?php }} wp_reset_postdata(); ?>

</section>