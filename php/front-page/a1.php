<?php
$a1_args = array(
    'tax_query' => array(
        array(
            'taxonomy' => 'syndication',
            'field' => 'slug',
            'terms' => 'front-feature',
            'numberposts' => 1,
            'fields' => 'ids'
        )
    )
);
$a1_posts = get_posts( $a1_args );
?>

<section class="a1">
    <div class="post-info">
        <h2 class="post-info-header"><a href="<?php echo esc_url(get_permalink($a1_posts[0])); ?>"><?php echo get_the_title($a1_posts[0]); ?></a></h2>
        <p class="post-info-text"><?php echo esc_html( get_field( 'homepage_excerpt', $a1_posts[0] ) ); ?></p>
        <div class="read-more-share">
            <a href="<?php echo esc_url(get_permalink($a1_posts[0])); ?>" class="read-more">Read More →</a>
            <div class="sharing">
                <a title="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink($a1_posts[0])); ?>"><i class="fab fa-facebook"></i></a>
                <a title="Share on Twitter" href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_permalink($a1_posts[0])); ?>"><i class="fab fa-twitter"></i></a>
                <a title="Send via Email" href="mailto:?subject=<?php echo esc_html( get_the_title($a1_posts[0]) ); ?>&body=Check%20out%20this%20article%3A%20<?php echo esc_url(get_permalink($a1_posts[0])); ?>"><i class="fas fa-envelope"></i></a>
            </div>
        </div>
    </div>
    <a href="<?php echo esc_url(get_permalink($a1_posts[0])); ?>"><img src="<?php echo esc_url(get_the_post_thumbnail_url($a1_posts[0], 'medium_large')); ?>"></a>
</section>