<div class="byline">
    <div class="avatars">
        <?php foreach( get_coauthors() as $coauthor ): ?>
        <img src="<?php echo get_avatar_url( $coauthor->ID ); ?>">
        <?php endforeach ?>
    </div>
    <div style="display: inline-block;">
        <span class="byline-authors">By <?php coauthors_posts_links(); ?><span class="byline-in"> in</span> <a href="<?php echo esc_url(get_category_link( get_the_category()[0]->term_id )); ?>"><?php echo esc_html( get_the_category()[0]->name ); ?></a></span>
    </div>
</div>