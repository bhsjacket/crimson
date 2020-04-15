<?php
$editors_picks_args = array(
    'tax_query' => array(
        array(
            'taxonomy' => 'syndication',
            'field' => 'slug',
            'terms' => 'editors-picks',
            'fields' => 'ids'
        ),
    ),
    'numberposts' => 5,
);
$editors_picks = get_posts( $editors_picks_args );
?>

<section class="editors-picks">
    <?php foreach($editors_picks as $editors_pick) { ?>
    <div class="post">
        <a class="post-title" href="<?php echo esc_url(get_permalink($editors_pick)) ?>"><h2><?php echo get_the_title($editors_pick); ?></h2></a>
        <a href="<?php echo esc_url(get_permalink($editors_pick)) ?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($editors_pick, 'thumbnail')); ?>"></a>
    </div>
    <?php } ?>
</section>