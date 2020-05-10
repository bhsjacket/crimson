<?php
    if(!empty($block['data']['options'])) {
        $options = $block['data']['options'];
    } else {
        $options = array();
    }

    $id = $block['id'];
?>

<style>
    #<?php echo $id; ?> .photo-grid-item {
        width: calc(<?php echo (100 / $block['data']['columns']) . '%'; ?> - <?php echo (($block['data']['columns'] - 1) * $block['data']['gap']) / $block['data']['columns'] . 'px' ?>);
        margin-bottom: <?php echo $block['data']['gap']; ?>px;
    }
    #<?php echo $id; ?>.photo-grid img {
        width: 100%;
        display: block;
    }
    <?php if(in_array('credit', $options)) { ?>
    #<?php echo $id; ?> .photo-grid .caption.column {
        width: 100%!important;
    }
    <?php } ?>
</style>

<div id="<?php echo $id; ?>" class="photo-grid <?php echo $block['align'] ?>-align-image">
    <?php foreach($block['data']['images'] as $image) { ?>
    <div class="photo-grid-item">
        <img src="<?php echo wp_get_attachment_image_src($image, 'large')[0]; ?>">
        <?php if(count($options) < 2) { ?>
        <div class="caption-group">
            <div class="caption column">
                <?php if(!in_array('caption', $options)) { ?>
                <p><?php echo wp_get_attachment_caption($image); ?></p>
                <?php } ?>
            </div>
            <?php if(!in_array('credit', $options)) { ?>
            <div class="photographer column">
                <p><?php echo get_field('media_author', $image); ?></p>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<script>
    jQuery(document).ready(function(){
        jQuery('#<?php echo $id; ?>').masonry({
            itemSelector: '#<?php echo $id; ?> .photo-grid-item',
            gutter: <?php echo $block['data']['gap']; ?>
        });
    })
</script>