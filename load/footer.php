<?php // The contents of this file will be loaded in the footer before the </body> tag ?>

<script src="<?php echo get_template_directory_uri(); ?>/balancer.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/scripts.js"></script>

<?php if(is_front_page()) { ?>
<?php // Front page code here ?>
<?php } ?>

<?php wp_footer(); ?>