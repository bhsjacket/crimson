<?php
$display = get_query_var('display-info');
?>

<section class="title">
    <i style="color: <?php echo $display['icon-color']; ?>" class="<?php echo $display['icon']; ?>"></i>
    <h2><a style="color: <?php echo $display['text-color']; ?>" href="<?php echo $display['url']; ?>"><?php echo $display['title']; ?></a></h2>
</section>