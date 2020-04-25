<?php if(get_post_type() == 'column' || get_post_type() == 'post') { ?>
<div class="article-sticky">
    <div class="article-sticky-inner">
        <div class="article-sticky-left">
            <a href="#comments"><i class="fas fa-comment"></i>Leave a comment</a>
        </div>
        <div class="article-sticky-center">
            <a href="<?php if(get_post_type() !== 'column') { echo esc_url(get_category_link( get_the_category()[0]->term_id )); } else { echo '/column'; }; ?>" class="article-sticky-section"><?php if(get_post_type() !== 'column') { echo get_the_category()[0]->name; } else { echo 'Column'; }; ?></a><span class="article-sticky-title"><?php echo get_the_title(); ?></span>
        </div>
        <div class="article-sticky-right">
            <ul>
                <li><a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://getpocket.com/edit?url=<?php echo get_permalink(); ?>"><i class="fab fa-get-pocket"></i></a></li>
                <li><a href="mailto:?subject=<?php echo esc_html( get_the_title() ); ?>&body=Check%20out%20this%20article%3A%20<?php echo get_permalink(); ?>"><i class="fas fa-envelope"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<?php } ?>