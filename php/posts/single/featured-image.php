<?php if ( has_post_thumbnail() ) {
    $thumb_url_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'reasonable', false); ?>
<!-- Image -->
<div class="featured-image">
    <img src="<?php echo $thumb_url_array[0]; ?>">
    <div class="caption-group">
        <div class="caption column">
            <p><?php echo get_field('featured_image_caption') ?></p>
        </div>
        <div class="photographer column">
            <p><?php echo get_field('featured_image_author') ?></p>
        </div>
    </div>
</div>
<!-- End Image -->
<?php } ?>