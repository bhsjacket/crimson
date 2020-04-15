<div class="post-meta-bottom">
    <div class="byline">
        <div class="avatars">
            <?php foreach( get_coauthors() as $coauthor ): ?>
            <img src="<?php echo get_avatar_url( $coauthor->ID ); ?>">
            <?php endforeach ?>
        </div>
        <div style="display: inline-block;">
            <span class="byline-authors">By <?php coauthors_posts_links(); ?></span>
        </div>
    </div>
    <div class="sharing">
        <a title="Share on Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"><i class="fab fa-facebook"></i></a>
        <a title="Share on Twitter" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>"><i class="fab fa-twitter"></i></a>
        <a title="Save to Pocket" href="https://getpocket.com/edit?url=<?php echo get_permalink(); ?>"><i class="fab fa-get-pocket"></i></a>
        <a title="Send via Email" href="mailto:?subject=<?php echo esc_html( get_the_title() ); ?>&body=Check%20out%20this%20article%3A%20<?php echo get_permalink(); ?>"><i class="fas fa-envelope"></i></a>
    </div>
</div>