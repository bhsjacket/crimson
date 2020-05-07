<div class="<?php echo $block['align']; ?>-align-image image-in-post">
    <div class="<?php echo $block['align']; ?>-align-image-inner">
        <?php if(empty(get_field('image'))) { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/editor-image-placeholder.png">
        <?php } else { ?>
        <img src="<?php echo get_field('image'); ?>">
        <?php } ?>
        <div class="caption-group">
            <div class="caption column">
                <p><?php echo get_field('caption'); ?></p>
            </div>
            <div class="photographer column">
                <p><?php echo get_field('source'); ?></p>
            </div>
        </div>
    </div>
</div>