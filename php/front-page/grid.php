<?php
// Custom WP query news
$args_news = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => 'news',
    'posts_per_page' => 4,
    'offset' => 2,
);

$news = new WP_Query( $args_news );
?>

<section id="news-grid" class="grid">
    <?php if ( $news->have_posts() ) : 
        while ( $news->have_posts() ) : $news->the_post(); ?>
        <div class="post-item">
            <div class="post-image">
                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>"></a>
            </div>
            <div class="post-title">
                <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
            </div>
        </div>
    <?php endwhile; 
    endif;
    wp_reset_postdata(); ?>
</section>

<?php
// Custom WP query news
$args_news = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => 'news',
    'posts_per_page' => 2,
    'offset' => 4,
);

$news = new WP_Query( $args_news );
?>

<section id="news-grid-mobile" class="grid">
    <?php if ( $news->have_posts() ) : 
        while ( $news->have_posts() ) : $news->the_post(); ?>
        <div class="post-item">
            <div class="post-image">
                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>"></a>
            </div>
            <div class="post-title">
                <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
            </div>
        </div>
    <?php endwhile; 
    endif;
    wp_reset_postdata(); ?>
</section>