<?php
$display = get_query_var('display-info');

if(empty($display['offset'])) {
    $offset = 0;
} else {
    $offset = $display['offset'];
}

if(empty($display['image-size'])) {
    $image_size = 'six-three';
} else {
    $image_size = $display['image-size'];
}

$args = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => $display['category'],
    'posts_per_page' => 5,
    'offset' => $offset,
);

$query = new WP_Query( $args );

if(!empty($display['pattern'])) {
    $pattern = ' ' . $display['pattern'];
} else {
    $pattern = '';
}
?>

<section class="slider<?php if($display['full-width'] == true) { echo ' full-width'; }; ?>">
    <div class="slides">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>
                
                <div class="swiper-slide">
                    <a href="<?php echo get_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), $image_size); ?>"></a>
                </div>

                <?php }} wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
    <div class="slider-posts <?php if($display['full-width'] == true) { echo ' contain'; }; ?>">
        <?php $i = 1; ?>
        <?php if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>
        <a class="slider-post" data-slide="<?php echo $i; ?>" href="<?php echo get_permalink(); ?>">
            <h2><?php echo get_the_title(); ?></h2>
        </a>
        <?php $i++; ?>
        <?php }} wp_reset_postdata(); ?>
    </div>
    <script>
    $(document).ready(function(){
        $('.slider-post[data-slide="1"]').attr("data-slide", 6);
        $('.slider-post:first-of-type').addClass('active-slide<?php echo $pattern; ?>');
    });
    var postSlider = new Swiper('.swiper-container', {
        effect: 'fade',
        loop: true,
        disableOnInteraction: false,
        simulateTouch: false,
        allowTouchMove: false,
        keyboard: false,
        autoplay: {
            delay: 2500,
        },
        on: {
            slideChange: function() {
                $('.slider-post.active-slide').removeClass('active-slide<?php echo $pattern; ?>');
                $('.slider-post[data-slide="' + postSlider.activeIndex + '"]').addClass('active-slide<?php echo $pattern; ?>');
            }
        }
    });
    $('.slider-post').hover(function() {
        postSlider.autoplay.stop();
        $(this).addClass('active-slide<?php echo $pattern; ?>');
        postSlider.slideTo($(this).data("slide"));
    });
    $('.slider-post').mouseleave(function() {
        postSlider.autoplay.start();
    })
    </script>

    <style>
    .slider-post.active-slide {
        color: <?php echo $display['text-color']; ?>;
        background-color: <?php echo $display['background-color']; ?>;
        transition: all 0.2s;
    }
    <?php if($display['posts-position'] == 'top') { ?>
    .slider {
        flex-direction: column-reverse!important;
    }
    <?php } ?>
    </style>
</section>