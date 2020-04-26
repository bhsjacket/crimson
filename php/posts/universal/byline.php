<?php if(get_post_type() !== 'column') { ?>

<div class="byline">
    <div class="avatars">
        <?php foreach( get_coauthors() as $coauthor ): ?>
        <img src="<?php echo get_avatar_url( $coauthor->ID ); ?>">
        <?php endforeach ?>
    </div>
    <div style="display: inline-block;">
        <span class="byline-authors">By <?php if(empty(get_field('custom_byline'))) { coauthors_posts_links(); } else { echo get_field('custom_byline'); }; ?><span class="byline-in"> in</span> <a href="<?php echo esc_url(get_category_link( get_the_category()[0]->term_id )); ?>"><?php echo esc_html( get_the_category()[0]->name ); ?></a></span>
    </div>
</div>

<?php } else { ?>

<div class="byline">
    <span class="byline-authors">By <?php if(empty(get_field('custom_byline'))) { coauthors_posts_links(); } else { echo get_field('custom_byline'); }; ?> on <?php echo get_the_date('F j, Y'); ?></span>
</div>

<?php } ?>