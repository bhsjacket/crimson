<?php if (have_posts()) { while (have_posts()) { the_post(); ?>

<?php /*
<div class="sidebar">
    <?php if(get_field('post_template') !== 'cover') { ?>
    <?php
    $editors_picks_args = array(
        'tax_query' => array(
            array(
                'taxonomy' => 'syndication',
                'field' => 'slug',
                'terms' => 'editors-picks',
                'fields' => 'ids'
            ),
        ),
        'numberposts' => 3,
    );
    $editors_picks = get_posts( $editors_picks_args );
    ?>
    <div id="recommended_posts">
        <h2>Editors' Picks</h2>
        <?php foreach($editors_picks as $editors_pick) { ?>
        <div class="recommended-post">
            <div class="post-title">
                <a class="post-title" href="<?php echo esc_url(get_permalink($editors_pick)) ?>"><?php echo get_the_title($editors_pick); ?></a></li>
            </div>
        </div>
        <?php } ?>
    </div>
    </div>
    <?php } ?>
</div>
*/ ?>

<main class="article-content">
    <?php the_content(); ?>
</main>

<?php // get_template_part('php/posts/universal/donation'); ?>

<div class="author-boxes normal" id="authors">
<?php foreach( get_coauthors() as $coauthor ) { ?>
    <div class="author-box">
        <img src="<?php echo get_avatar_url($coauthor->data->ID); ?>" class="author-box-avatar">
        <div class="author-box-info">
            <a href="<?php echo get_author_posts_url($coauthor->ID); ?>"><h2><?php echo $coauthor->display_name ?></h2></a>
            <span class="author-role"><?php echo get_field('position', 'user_' . $coauthor->ID); ?></span>
        </div>
</div>
<?php } ?>
</div>

<?php }} ?>

<?php if(count(get_coauthors()) > 1) { ?> 
<style>
.author-box {
    margin-bottom: 0;
    border-bottom: none;
}
.author-box-outer:last-child .author-box {
    border-bottom: solid 1px #e7e7e7;
    margin-bottom: 15px;
}
</style>
<?php } ?>