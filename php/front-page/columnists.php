<?php
$display = get_query_var('display-info');

$args = array(
	'post_type' => array('column'),
	'post_status' => array('publish'),
    'posts_per_page' => 5,
    'offset' => 0,
);
$query = new WP_Query( $args ); ?>

<section class="columnists">

<?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>

    <a href="<?php echo get_permalink(); ?>">
        <div class="columnist-post <?php if(!empty(get_field('homepage_quote'))) { echo 'column-quote'; }; ?>">
            <img src="<?php echo get_avatar_url( get_coauthors()[0]->ID ); ?>">
            <?php if(empty(get_field('homepage_quote'))) { ?>
            <span><?php echo get_coauthors()[0]->display_name; ?></span>
            <?php } ?>
            <h2><?php if(empty(get_field('homepage_quote'))) { echo get_the_title(); } else { echo get_field('homepage_quote'); }; ?></h2>
            <?php if(!empty(get_field('homepage_quote'))) { ?>
            <span><?php echo get_coauthors()[0]->display_name; ?></span>
            <?php } ?>
        </div>
    </a>
    
<?php }} wp_reset_postdata(); ?>
    
</section>