<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
<main class="article-content">
    <?php the_content(); ?>
</main>


<div class="author-boxes">
<?php foreach( get_coauthors() as $coauthor ) { ?>

<div class="author-box-outer">
    <div class="author-box">
        <div class="author-box-avatar-column">
            <img src="<?php echo get_avatar_url($coauthor->data->ID); ?>" class="author-box-avatar">
        </div>
        <div class="author-box-info-column">
            <h2 class="author-box-name"><?php echo $coauthor->display_name ?></h2>
            <p class="author-box-bio"><?php echo esc_html( get_the_author_meta('description', $coauthor->data->ID) ) ?></p>
            <div class="author-box-social">
                <a class="button outline dark" href="http://jacket.local/?s=<?php echo str_replace(' ', '+', $coauthor->display_name); ?>">More posts →</a>
                <?php if(!empty(get_the_author_meta( 'twitter' ))) { ?>
                <a href="https://twitter.com/<?php echo get_the_author_meta( 'twitter' ); ?>"><i class="fab fa-twitter"></i></a>
                <?php } ?>
                <?php if(!empty(get_the_author_meta( 'instagram' ))) { ?>
                <a href="https://instagram.com/<?php echo get_the_author_meta( 'instagram' ); ?>"><i class="fab fa-instagram"></i></a>
                <?php } ?>
                <?php if(!empty(get_the_author_meta( 'facebook' ))) { ?>
                <a href="<?php echo get_the_author_meta( 'facebook' ); ?>"><i class="fab fa-facebook"></i></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
</div>

<?php }} ?>