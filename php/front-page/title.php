<?php
$display = get_query_var('display-info');
?>

<section class="title">
    <div class="title-inner" style="margin: 0 auto; display: flex;">
        <i style="color: <?php echo $display['icon-color']; ?>" class="<?php echo $display['icon']; ?>"></i>
        <h2><a style="color: <?php echo $display['text-color']; ?>" href="<?php echo $display['url']; ?>"><?php echo $display['title']; ?></a></h2>
    </div>
</section>