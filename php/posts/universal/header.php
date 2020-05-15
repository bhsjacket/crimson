<?php if(get_the_date('Y-m-d') < date("Y-m-d",strtotime("-3 months"))) { ?>
<div class="old-article">
    <span><?php echo '<i class="far fa-clock"></i> This article is ' . human_time_diff(get_the_date('U'),date('U')) . ' old'; ?></span>
</div>
<?php } ?>
<h1 class="article-title"><?php echo wp_kses_post( get_the_title() ); ?></h1>
<!-- Byline & Sharing -->
<?php
if(!empty(get_field('additional_options'))) {
    $additional_options = get_field('additional_options');
} else {
    $additional_options = array('');
}
?>
<div class="post-meta">
    <?php if(!in_array('hide_byline', $additional_options)) { ?>
    <?php get_template_part('php/posts/universal/byline'); ?>
    <?php } ?>
    <?php if(!in_array('date_sharing', $additional_options)) { ?>
    <div class="sharing">
        <?php if(!in_array('sharing', $additional_options)) { ?>
        <p class="post-date"><?php echo get_the_date('F j, Y'); ?></p>
        <?php } else { ?>
        <a title="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"><i class="fab fa-facebook"></i></a>
        <a title="Share on Twitter" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>"><i class="fab fa-twitter"></i></a>
        <a title="Save to Pocket" href="https://getpocket.com/edit?url=<?php echo get_permalink(); ?>"><i class="fab fa-get-pocket"></i></a>
        <a title="Send via Email" href="mailto:?subject=<?php echo esc_html( get_the_title() ); ?>&body=Check%20out%20this%20article%3A%20<?php echo get_permalink(); ?>"><i class="fas fa-envelope"></i></a>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<?php if(!empty(get_field('additional_options'))) { ?>
<style>
<?php if(in_array('centered', get_field('additional_options'))) { ?>
    .article-title {
        text-align: center!important;
    }
    .post-meta {
        flex-direction: column!important;
    }
    .sharing {
        text-align: center!important;
        width: 100%!important;
    }
    .byline {
        width: 100%!important;
        text-align: center!important;
        <?php if(!in_array('date_sharing', get_field('additional_options'))) { ?>
        padding-bottom: 15px!important;
        <?php } ?>
    }
    .byline-in,
    .byline-section {
        display: none!important;
    }
<?php } ?>
<?php if(in_array('hide_avatars', get_field('additional_options'))) { ?>
    .byline .avatars {
        display: none!important;
    }
<?php } ?>
</style>
<?php } ?>