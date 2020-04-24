<header class="featured-image-cover">
    <div style="background-image: url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', true)[0]; ?>')" class="featured-image-cover-image">
        <div class="cover-title-outer">
            <div class="cover-title">
                <h1 class="article-title"><?php echo wp_kses_post( get_the_title() ); ?></h1>
            </div>
        </div>
    </div>
    <div class="caption-group">
        <div class="caption column">
            <p><?php echo get_field('featured_image_caption') ?></p>
        </div>
        <div class="photographer column">
            <p><?php echo get_field('featured_image_author') ?></p>
        </div>
    </div>
</header>

<style>
<?php if(get_field('cover_image_position') == 'center') { ?>
    .featured-image-cover-image {
        justify-content: center;
        align-items: center;
    }
<?php } ?>
<?php if(get_field('cover_image_position') == 'bottom') { ?>
    .featured-image-cover-image {
        align-items: flex-end;
    }
    .cover-title-outer {
        margin: 0;
    }
<?php } ?>
</style>