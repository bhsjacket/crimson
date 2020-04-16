<?php
// Top Story
$args_top_story = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
	'tax_query' => array(
		array(
			'taxonomy' => 'syndication',
			'field' => 'slug',
			'terms' => array('front-feature'), // Might be an issue
			'include_children' => false,
		),
    ),
    'posts_per_page' => 1,
);

$top_story = new WP_Query( $args_top_story );

// 20% Feature
$args_features = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => 'features',
    'posts_per_page' => 1,
);

$features = new WP_Query( $args_features );

// News
$args_news = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => 'news',
    'posts_per_page' => 2,
);

$news = new WP_Query( $args_news );
?>
<section id="news-row" class="f2f">
    <div class="f2f-left">
        <?php if ( $top_story->have_posts() ) : 
            while ( $top_story->have_posts() ) : $top_story->the_post(); ?>
                <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>"></a>
                <p class="excerpt"><?php if(!empty(get_field('homepage_excerpt'))) { echo get_field('homepage_excerpt'); } else { echo wp_trim_excerpt(); } ?></p>
            <?php endwhile; 
        endif;
        wp_reset_postdata(); ?>
    </div>
    <div class="f2f-center">
        <?php if ( $features->have_posts() ) : 
            while ( $features->have_posts() ) : $features->the_post(); ?>
                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>"></a>
                <p class="section"><?php if (!empty(get_the_tags())) { echo esc_html(get_the_tags()[0]->name); } else { if(!empty(get_the_category())) { echo esc_html(get_the_category()[0]->name); }} ?></p>
                <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                <p class="excerpt"><?php if(!empty(get_field('homepage_excerpt'))) { echo get_field('homepage_excerpt'); } else { echo wp_trim_excerpt(); } ?></p>
            <?php endwhile; 
        endif;
        wp_reset_postdata(); ?>
    </div>
    <div class="f2f-right">
        <?php if ( $news->have_posts() ) : 
            while ( $news->have_posts() ) : $news->the_post(); ?>
                <div class="f2f-right-section">
                    <p class="section"><?php if (!empty(get_the_tags())) { echo esc_html(get_the_tags()[0]->name); } else { if(!empty(get_the_category())) { echo esc_html(get_the_category()[0]->name); }} ?></p>
                    <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                    <p class="excerpt"><?php if(!empty(get_field('homepage_excerpt'))) { echo get_field('homepage_excerpt'); } else { echo wp_trim_excerpt(); } ?></p>
                </div>
            <?php endwhile; 
        endif;
        wp_reset_postdata(); ?>
    </div>
</section>      