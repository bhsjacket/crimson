<div class="two-images image-in-post {{width}}-two-images">
	<div class="first-image">
		<img src="<?php echo get_field('first_image'); ?>">
		<div class="caption-group">
			<div class="caption column">
				<p><?php echo get_field('first_image_caption'); ?></p>
			</div>
			<div class="photographer column">
				<p><?php echo get_field('first_image_source'); ?></p>
			</div>
		</div>
	</div>
	<div class="second-image">
		<img src="<?php echo get_field('second_image'); ?>">
		<div class="caption-group">
			<div class="caption column">
				<p><?php echo get_field('second_image_caption'); ?></p>
			</div>
			<div class="photographer column">
				<p><?php echo get_field('second_image_source'); ?></p>
			</div>
		</div>
	</div>
</div>