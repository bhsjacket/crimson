<?php
$category = explode(",", get_query_var('display-info'))[0];
$offset = explode(",", get_query_var('display-info'))[1];
$bg_color = explode(",", get_query_var('display-info'))[2];
$text_color = explode(",", get_query_var('display-info'))[3];
$gradient = explode(",", get_query_var('display-info'))[4];

$args = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => $category,
    'posts_per_page' => 3,
    'offset' => $offset,
    'meta_key' => '_thumbnail_id',
);

$query = new WP_Query( $args );

$image_args = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => $category,
    'posts_per_page' => 1,
    'offset' => $offset + 3,
);

$image_query = new WP_Query( $image_args ); ?>

<?php if($position == 'right') { ?>
<style>
    .one3-post:first-child {
        grid-area: 1 / 1 / 2 / 2;
    }

    .one3-post:nth-child(2) {
        grid-area: 2 / 1 / 3 / 2;
    }

    .one3-post:last-child {
        grid-area: 3 / 1 / 4 / 2;
    }

    .one3-image {
        grid-area: 1 / 2 / 4 / 3;
    }
</style>
<?php } else { ?>
<style>
    .one3-post:first-child {
        grid-area: 1 / 2 / 2 / 3;
    }

    .one3-post:nth-child(2) {
        grid-area: 2 / 2 / 3 / 3;
    }

    .one3-post:last-child {
        grid-area: 3 / 2 / 4 / 3;
    }

    .one3-image {
        grid-area: 1 / 1 / 4 / 2;
    }
</style>
<?php } ?>


<section class="one3">

<?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>

    <style>
        @media all and (orientation: portrait) {
            .one3-post {
                background: <?php echo $bg_color; ?>!important;
            }
            .one3 .one3-post h2 {
                max-width: 100%;
            }
        }
    </style>

    <a href="<?php echo get_permalink(); ?>" class="one3-post" style="<?php if($gradient == 'true' && $width !== 'true') { ?>background: linear-gradient(to right, <?php echo $bg_color; ?> 60%, rgb(0,0,0,0) 80%), url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>'), <?php echo $bg_color; ?>; background-size: contain; background-position: right; background-repeat: no-repeat;<?php } ?>background-color: <?php echo $bg_color; ?>">
        <h2 style="color: <?php echo $text_color; ?>"><?php echo get_the_title(); ?></h2>
        <p><?php echo get_the_author_meta('display_name'); ?> in <?php echo get_the_category()[0]->name; ?></p>
    </a>

<?php }} wp_reset_postdata(); ?>


<?php if ( $image_query->have_posts() ) { while ( $image_query->have_posts() ) { $image_query->the_post(); ?>

    <a href="<?php echo get_permalink(); ?>" class="one3-image" style="background-color: <?php echo $bg_color; ?>">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>">
        <h2 class="one3-image-title" style="color: <?php echo $text_color; ?>; background-color: <?php echo $bg_color; ?>;"><?php echo get_the_title(); ?></h2>
    </a>

<?php }} wp_reset_postdata(); ?>