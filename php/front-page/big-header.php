<script>
$("#header").hide();
function showMenu() {
    $("#header").slideDown('slow');
    $(".overlay").fadeIn('slow');
};
function hideMenu() {
    $(".overlay").fadeOut('slow');
    $("#header").slideUp('slow');
};
$(document).scroll(function(){
    if($(document).scrollTop() > 500) {
        $("#header").slideDown('slow');
        $(".overlay").fadeOut('slow');
    };
    if($(document).scrollTop() < 500) {
        $("#header").slideUp('slow');
        $(".overlay").fadeOut('slow');
    };
});
</script>
<style>
    #header {
        position: fixed;
        z-index: 10;
        width: 100%;
    }
</style>
<?php // Top Story
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
$top_story = new WP_Query( $args_top_story );?>
<?php if ( $top_story->have_posts() ) : while ( $top_story->have_posts() ) : $top_story->the_post(); ?>
<div class="overlay" onclick="hideMenu();"></div>
<header class="big-header" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>');">
    <div class="big-header-navigation">
        <div id="menu-toggle" onclick="showMenu();">
            <div class="menu-icon">
                <div class="hamburger-wrap"> <span></span> <span></span> <span></span> </div>
            </div>
        </div>
        <a class="big-header-logo" href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-light.svg"></a>
        <div id="search-button">
            <i onclick="showMenu();" class="fas fa-search"></i>
        </div>
    </div>
    <div class="big-header-info">
        <a class="big-title balance-text" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
        <span class="big-more">More</span><i class="fas fa-chevron-down"></i>
    </div>
</header>
<?php endwhile; endif; wp_reset_postdata(); ?>