<div class="column-header">
    <div class="avatars">
        <?php foreach( get_coauthors() as $coauthor ): ?>
        <img src="<?php echo get_avatar_url( $coauthor->ID ); ?>">
        <?php endforeach ?>
    </div>
    <div>
        <h2 class="column-byline"><?php coauthors_posts_links(); ?></a></h2>
    </div>
</div>