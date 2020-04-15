<?php

parse_str( parse_url( esc_url(get_field('video_url')), PHP_URL_QUERY ), $video_array );
$video_id = $video_array['v'];

?>

<div class="featured-video">
    <div class='embed-container'>
        <iframe src='<?php echo 'https://www.youtube.com/embed/' . $video_id; ?>' frameborder='0' allowfullscreen></iframe>
    </div>
    <div class="caption-group">
        <div class="caption column">
            <p><?php echo get_field('featured_image_caption') ?></p>
        </div>
        <div class="photographer column">
            <p><?php echo get_field('featured_image_author') ?></p>
        </div>
    </div>
</div>