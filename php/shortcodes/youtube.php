<?php
parse_str( parse_url( esc_url({{url}}), PHP_URL_QUERY ), $video_array );
$video_id = $video_array['v'];

/**
 * {{caption}} is a textarea field
 * {{source}} is a text field
 * {{url}} is a youtube url
 */

?>

<div class="featured-video">
    <div class='embed-container'>
        <iframe src='<?php echo 'https://www.youtube.com/embed/' . $video_id; ?>' frameborder='0' allowfullscreen></iframe>
    </div>
    <div class="caption-group">
        <div class="caption column">
            <p><{{caption}}</p>
        </div>
        <div class="photographer column">
            <p>{{source}}</p>
        </div>
    </div>
</div>