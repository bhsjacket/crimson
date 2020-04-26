<?php
$vimeo_id = (int) substr(parse_url($url, PHP_URL_PATH), 1);
?>

<div class="featured-video">
    <div class='embed-container'>
        <iframe src='https://player.vimeo.com/video/<?php echo $vimeo_id;?>' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen>
        </iframe>
    </div>
    <div class="caption-group">
        <div class="caption column">
            <p><?php echo $caption; ?></p>
        </div>
        <div class="photographer column">
            <p><?php echo $source; ?></p>
        </div>
    </div>
</div>