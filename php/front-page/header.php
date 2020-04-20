<?php
$display = get_query_var('display-info');
?>

<section class="header" style="<?php if($display['border'] !== false) { ?> box-shadow: inset 0px <?php if($display['border'] == 'top') { echo '-'; }; ?>5px 0px 0px <?php echo $display['border']['color']; ?>; <?php if($display['border']['position'] == 'top' || $display['border']['position'] == 'bottom') { echo 'padding-' .  $display['border']['position'] . ': 15px;'; }; ?> text-align: <?php echo $display['alignment']; ?>; background-color: <?php echo $display['background-color']; } ?>">
    <?php if(is_numeric($display['title'])) { ?>
    <img src="<?php echo wp_get_attachment_image_src($display['title'], 'full')[0]; ?>">
    <?php } else { ?>
    <h2 style="color: <?php echo $display['text-color']; ?>"><?php echo $display['title']; ?></h2>
    <?php } ?>
</section>