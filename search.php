<?php get_header(); ?>
    <main id="search">
        <div id="controls">
            <form id="searchform2" method="get" action="<?php echo home_url('/'); ?>">
                <i class="fas fa-search"></i>
                <input type="text" class="search-field" name="s" placeholder="Search..." value="<?php the_search_query(); ?>">
            </form>
            <p class="form-info">You can use this form to search for keywords, articles, writers, photographers, illustrators, and more. For best results when searching for a person, use quotation marks. You can also use AND and OR search operators.</p>
            <hr class="mobile-divider">
        </div>

        <div id="results">
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

            <div class="search-result">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                <div class="post-info">
                    <a class="search-post-title" href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                    <p class="meta">By <?php coauthors_posts_links(); ?> on <?php the_date(); ?> in <a href="<?php echo esc_url(get_category_link( get_the_category()[0]->term_id )); ?>"><?php echo esc_html( get_the_category()[0]->name ); ?></a></p>
                    <?php if(!empty(get_field('homepage_excerpt'))) { ?>
                    <p class="post-excerpt"><?php echo esc_html(get_field('homepage_excerpt')); ?></p>
                    <?php } else { ?>
                    <?php the_excerpt(); ?>
                    <?php } ?>
                </div>
            </div>

            <?php endwhile; ?>
            
            <hr>
            <?php the_posts_navigation(); ?>

            <?php endif; ?>
        </div>

    </main>
<?php get_footer(); ?>