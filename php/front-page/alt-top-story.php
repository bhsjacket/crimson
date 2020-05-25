<?php
$display = get_query_var('display-info');

if(empty($display['offset'])) {
    $offset = 0;
} else {
    $offset = $display['offset'];
}

if($display['front-feature'] !== true) {
    $args = array(
        'post_type' => array('post'),
        'post_status' => array('publish'),
        'category_name' => $display['category'],
        'posts_per_page' => 1,
        'offset' => $offset,
    );
} else { if($display['front-feature'] == true) {
    $args = array(
        'posts_per_page' => 1,
        'post_status' => array('publish'),
        'offset' => $offset,
        'ignore_sticky_posts' => true,
        'tax_query' => array(
            array(
                'taxonomy' => 'syndication',
                'field' => 'slug',
                'terms' => 'front-feature',
                'fields' => 'ids'
            )
        )
    );
}};

$query = new WP_Query( $args ); ?>

<?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>

<section class="min-top-story wider<?php if($display['align'] == 'right') { echo ' right-align'; } ?>">
    <a href="<?php echo get_permalink(); ?>" class="min-top-story-right">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'six-three'); ?>">
    </a>
    <a href="<?php echo get_permalink(); ?>" class="min-top-story-left"<?php if($display['align_text'] == 'center') { echo ' style="text-align:center;"'; } ?>>
        <div class="min-kicker-outer">
            <?php if($display['live_icon'] == true) { ?>
            <img class="live-icon" src="<?php echo get_template_directory_uri(); ?>/images/live.svg">
            <?php } ?>
            <span class="min-section"<?php if($display['kicker_color'] == 'red') { echo ' style="color:#800000;"'; } ?>><?php if(!empty(get_field('kicker'))) { echo get_field('kicker'); } else { echo get_the_category()[0]->name; } ?></span>
        </div>
        <h2 class="min-headline"><?php echo get_the_title(); ?></h2>
        <?php if(!empty(get_field('homepage_excerpt'))) { ?><p class="min-excerpt"><?php echo get_field('homepage_excerpt'); ?></p><?php } ?>
    </a>
</section>

<?php }} wp_reset_postdata(); ?>