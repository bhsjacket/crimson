<?php
if(!empty(get_field('hide_elements'))) {
    $elements = get_field('hide_elements');
} else {
    $elements = array('blank', 'array');
}

?>

<body>
    <a href="/"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-light.svg"></a>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!-- Cover slide -->
            <div class="swiper-slide">
            <?php if(!in_array("title", $elements)) { ?>
                <div class="cover">
                    <h1 class="article-title"><?php echo esc_html( get_the_title() ); ?></h1>
                    <?php if(!in_array("byline", $elements)) { ?>
                    <h2 class="article-byline"><span class="article-byline">By</span> <?php coauthors_posts_links(); ?> <?php if(!in_array("section", $elements)) { ?>in <?php the_category(', '); } ?></h2>
                    <?php } ?>
                </div>
            <?php } ?>
                    <div class="slideshow-image cover-image" style="<?php if(!in_array("title", $elements)) { ?>opacity: 0.6; <?php } ?>background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>')"></div>
            </div>
            <!-- End cover slide -->
            <?php $images = get_field('slideshow'); ?>
            <?php foreach($images as $image) { ?>
            <div class="swiper-slide">
                <div class="slideshow-image swiper-lazy" data-background="<?php echo $image['url']; ?>" style="background-size:<?php if ( get_field('image_display', $image['id']) == '' ) {
                    echo get_field('fullscreen_slideshow_options');
                } else {
                    echo get_field('image_display', $image['id']);
                } ?>">
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                </div>
                <div class="slideshow-image-meta">
                    <?php if (!empty($image['caption'])) { ?>
                    <p class="slideshow-image-meta-caption"><?php echo esc_html($image['caption']); ?></p>
                    <?php } ?>
                    <p class="slideshow-image-meta-author"><?php echo esc_html(the_field('media_author', $image['id'])); ?></p>
                </div>
            </div>
            <?php } ?>
            <?php if(!in_array("last_slide", $elements)) { ?>
            <!-- Final slide -->
            <div class="swiper-slide last-slide">
                <div class="cover" style="text-align: left!important;">

                    <?php 
                    $photographers = array();
                    foreach( $images as $image ) {
                        $photographers[] = esc_html( get_field('media_author', $image['id']) );
                    }
                    
                    $photographers_cleaned = array_filter( array_unique( $photographers) );
                    
                    if (count($photographers_cleaned)>2) {
                        $photographers_cleaned = implode(', ', array_slice($photographers_cleaned, 0, count($photographers_cleaned)-1)) . ', and ' . end($photographers_cleaned);
                    } else {
                        $photographers_cleaned = implode(' and ', $photographers_cleaned);
                    }
                    ?>

                    <div class="credits">
                        <p class="article-code-byline"><?php echo 'Images by ' .$photographers_cleaned; ?></p>
                        <p class="article-code-byline"><span>Development by</span> <a href="https://jeromepaulos.com">Jerome Paulos</a></p>
                    </div>

                    <?php if(!empty(get_field('recommended_post'))) { ?>
                    <div class="recommended-post">
                        <p><a href="<?php echo get_permalink(get_field('recommended_post')); ?>">Recommended: <?php echo esc_html(get_the_title(get_field('recommended_post'))); ?></a></p>
                        <a href="<?php echo get_permalink(get_field('recommended_post')); ?>"><img src="<?php echo esc_url(wp_get_attachment_image_src(get_post_thumbnail_id(get_field('recommended_post'),), 'three-two')[0]); ?>"></a>
                    </div>
                    <?php } ?>
                    <div class="square">
                        <?php get_template_part('php/ads/square'); ?>
                    </div>
                </div>
            </div>
            <!-- End final slide -->
            <?php } ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-restart"></div>
        <div class="swiper-fullscreen"></div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

        <script>
            var swiper = new Swiper('.swiper-container', {
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                keyboard: true,
                lazy: true,
                loadPrevNextAmount: 3,
            });

            swiper.on('slideChange', function () {
                if($(".swiper-button-prev").hasClass("swiper-button-disabled")) {
                    $(".swiper-fullscreen").show();
                } else {
                    $(".swiper-fullscreen").hide();
                }
            });

            $(".swiper-restart").hide();
            swiper.on('slideChange', function () {
                if($(".swiper-button-next").hasClass("swiper-button-disabled")) {
                    $(".swiper-restart").show();
                } else {
                    $(".swiper-restart").hide();
                }
            });

            if(document.fullscreenEnabled) {
                $(".swiper-fullscreen").click(function(){
                    document.documentElement.requestFullscreen();
                    $(".swiper-fullscreen").click(function(){
                        document.exitFullscreen();
                    })
                })
            } else {
                $(".swiper-fullscreen").hide();
            };

            document.addEventListener("fullscreenchange", function (event) {
                if (document.fullscreenElement) {
                    $('.swiper-fullscreen').addClass("fullscreen-close");
                } else {
                    $('.swiper-fullscreen').removeClass("fullscreen-close");
                }
            });

            $(".swiper-restart").click(function(){
                var slideTime = swiper.slides.length * 75;
                swiper.slideTo(0, slideTime);
            });

        </script>
    </div>
</body>