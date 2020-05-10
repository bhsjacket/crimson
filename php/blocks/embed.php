<div <?php if(!empty($block['data']['height'])) { echo 'style="height: ' . $block['data']['height'] . 'px"'; } ?> class="<?php echo $block['align']; ?> advanced-embed">
    <?php if(!empty($block['data']['php_path']) && empty($block['data']['html_code'])) { ?>
    <?php get_template_part($block['data']['php_path']); ?>
    <?php } ?>

    <?php if(!empty($block['data']['html_code']) && empty($block['data']['php_path'])) { ?>
    <?php print_r($block['data']['html_code']); ?>
    <?php } ?>
</div>