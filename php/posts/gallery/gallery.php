<?php if( have_rows('gallery') ): ?>
    <?php while( have_rows('gallery') ): the_row(); ?>
        <?php if( get_row_layout() == 'single' ):?>

            <div class="wider-image wide image-in-post">
                <img src="<?php echo get_sub_field('image'); ?>">
                <div class="caption-group">
                    <div class="caption column">
                        <p><?php echo get_sub_field('caption'); ?></p>
                    </div>
                    <div class="photographer column">
                        <p><?php echo get_sub_field('source'); ?></p>
                    </div>
                </div>
            </div>

        <?php elseif( get_row_layout() == 'two_images' ): ?>

            <div class="wide two-images image-in-post">
                <div>
                    <img src="<?php echo get_sub_field('first_image'); ?>">
                    <div class="caption-group">
                        <div class="caption column">
                            <p><?php echo get_sub_field('first_caption'); ?></p>
                        </div>
                        <div class="photographer column">
                            <p><?php echo get_sub_field('first_source'); ?></p>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="<?php echo get_sub_field('second_image'); ?>">
                    <div class="caption-group">
                        <div class="caption column">
                            <p><?php echo get_sub_field('second_caption'); ?></p>
                        </div>
                        <div class="photographer column">
                            <p><?php echo get_sub_field('second_source'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif(get_row_layout() == 'single_column'): ?>

            <?php foreach(get_sub_field('images') as $image) { ?>
                <div class="wider-image wide image-in-post">
                    <img src="<?php echo $image['url']; ?>">
                    <div class="caption-group">
                        <div class="caption column">
                            <p><?php echo $image['caption']; ?></p>
                        </div>
                        <div class="photographer column">
                            <p><?php echo get_field('media_author', $image['id']); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>

        <?php elseif( get_row_layout() == 'text' ): ?>

            <p><?php echo get_sub_field('content'); ?></p>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>