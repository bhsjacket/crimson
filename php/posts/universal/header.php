<h1 class="article-title"><?php echo wp_kses_post( get_the_title() ); ?></h1>
<!-- Byline & Sharing -->
<div class="post-meta">
    <?php get_template_part('php/posts/universal/byline'); ?>
    <div class="sharing">
        <a title="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"><i class="fab fa-facebook"></i></a>
        <a title="Share on Twitter" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>"><i class="fab fa-twitter"></i></a>
        <a title="Save to Pocket" href="https://getpocket.com/edit?url=<?php echo get_permalink(); ?>"><i class="fab fa-get-pocket"></i></a>
        <a title="Send via Email" href="mailto:?subject=<?php echo esc_html( get_the_title() ); ?>&body=Check%20out%20this%20article%3A%20<?php echo get_permalink(); ?>"><i class="fas fa-envelope"></i></a>
    </div>
</div>
<!-- End Byline & Sharing -->