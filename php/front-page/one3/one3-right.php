<section class="one3 one3-right-image">
    <?php
$category = explode(",", get_query_var('display-info'))[0];
$offset = explode(",", get_query_var('display-info'))[1];
$bg_color = explode(",", get_query_var('display-info'))[2];
$text_color = explode(",", get_query_var('display-info'))[3];
$gradient = explode(",", get_query_var('display-info'))[4];
$width = explode(",", get_query_var('display-info'))[5];

$left_args = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => $category,
    'posts_per_page' => 1,
    'offset' => $offset,
    'meta_key' => '_thumbnail_id',
);

$left_query = new WP_Query( $left_args );

$right_args = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => $category,
    'posts_per_page' => 3,
    'offset' => $offset + 1,
);

$right_query = new WP_Query( $right_args ); ?>

    <div class="one3-right">
        <?php if ( $right_query->have_posts() ) { while ( $right_query->have_posts() ) { $right_query->the_post(); ?>
            <a class="one3-right-post" href="<?php echo get_permalink(); ?>" style="<?php if($gradient == 'true' && $width !== 'true') { ?>background: linear-gradient(to right, <?php echo $bg_color; ?> 70%, rgb(255,255,255,0) 100%), url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>'), <?php echo $bg_color; ?>; background-size: contain; background-position: right; background-repeat: no-repeat;<?php } ?>background-color: <?php echo $bg_color; ?>">
                <h2 style="color: <?php echo $text_color; ?>"><?php echo get_the_title(); ?></h2>
                <p style="color: <?php echo $text_color; ?>" class="one3-byline"><?php echo get_the_author_meta('display_name'); ?> in <?php echo get_the_category()[0]->name; ?></p>
            </a>
        <?php }} wp_reset_postdata(); ?>
    </div>

    <?php if ( $left_query->have_posts() ) { while ( $left_query->have_posts() ) { $left_query->the_post(); ?>

    <a href="<?php echo get_permalink(); ?>" class="one3-left" <?php if($width == 'true') { ?>style="width: initial!important;"<?php } ?>>
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>">
        <div class="one3-left-title" style="background-color: <?php echo $bg_color; ?>">
            <h2 style="color: <?php echo $text_color; ?>"><?php echo get_the_title(); ?></h2>
        </div>
    </a>

<?php }} wp_reset_postdata(); ?>
</section>