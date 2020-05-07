<?php
$display = get_query_var('display-info');

if(empty($display['offset'])) {
    $offset = 0;
} else {
    $offset = $display['offset'];
}

$args = array(
	'post_type' => array('post'),
	'post_status' => array('publish'),
    'category_name' => $display['category'],
    'posts_per_page' => $display['posts'],
    'offset' => $offset,
    'meta_key' => '_thumbnail_id',
);

$query = new WP_Query( $args ); ?>

<?php if ( $query->have_posts() ) { ?>
<section class="small-slider wider">
    <div class="small-swiper-container">
        <div class="swiper-wrapper">
            <?php while ( $query->have_posts() ) { $query->the_post(); ?>
            <div class="swiper-slide">
                <a href="<?php echo get_permalink(); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'three-two'); ?>">
                    <div class="small-slider-title">
                        <h2><?php echo get_the_title(); ?></h2>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="small-nav">
        <div class="small-nav-outer-prev">
            <i class="far fa-arrow-left small-nav-prev"></i>
        </div>
        <div class="small-nav-dots"></div>
        <div class="small-nav-outer-next">
            <i class="far fa-arrow-right small-nav-next"></i>
        </div>
    </div>
</section>
<?php } wp_reset_postdata(); ?>

<script>
    $(document).ready(function(){
        var smallSlider = new Swiper('.small-swiper-container', {
            spaceBetween: 15,
            slidesPerView: 3,
            grabCursor: true,
            pagination: {
                el: '.small-nav-dots',
            },
            navigation: {
                nextEl: '.small-nav-next',
                prevEl: '.small-nav-prev',
            },
            breakpoints: {
                1000: {
                    slidesPerView: 2,
                },
                750: {
                    slidesPerView: 1,
                }
            },
        });
    })
</script>