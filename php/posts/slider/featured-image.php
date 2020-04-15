<?php $images = get_field('slideshow'); ?>

<div class="image-slider-wrapper">
    <div class="image-slider swiper-container">
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
        <div class="swiper-wrapper">
            <?php foreach($images as $image) { ?>
            <div class="swiper-slide">
                <img class="slideshow-image" src="<?php echo wp_get_attachment_image_src( $image['id'], 'three-two' )[0]; ?>">
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="caption-slider-wrapper">
    <div class="caption-slider swiper-container">
        <div class="swiper-wrapper">
            <?php foreach(get_field('slideshow') as $image) { ?>
            <div class="swiper-slide">
                <div class="caption-group swiper-slide">
                    <div class="caption column">
                        <p><?php echo esc_html($image['caption']); ?></p>
                    </div>
                    <div class="photographer column">
                        <p><?php echo esc_html(the_field('media_author', $image['id'])); ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
      $(document).ready(function() {

        var captionSlider = new Swiper('.caption-slider', {
            spaceBetween: 30
        });

        var imageSlider = new Swiper('.image-slider', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            spaceBetween: 30,
            keyboard: true,
            controller: {
                control: captionSlider,
            }
        });

        captionSlider.controller.control = imageSlider;

    });
</script>