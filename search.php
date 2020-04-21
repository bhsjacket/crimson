<?php get_header(); ?>
    <main id="search">
        <div id="controls">
            <form id="searchform2" method="get" action="<?php echo home_url('/'); ?>">
                <i class="fas fa-search"></i>
                <input type="text" class="search-field" name="s" placeholder="Search..." value="<?php the_search_query(); ?>">
            </form>
            <p class="form-info">You can use this form to search for keywords, articles, writers, photographers, illustrators, and more. For best results when searching for a person, use quotation marks. You can also use AND and OR search operators.</p>
        </div>

        <div id="results">
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

            <div class="search-result">
                <p class="search-result-date"><?php echo get_the_date(); ?></p>
                <div class="search-result-article">
                    <h2 class="search-result-article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="search-result-meta">By <?php coauthors_posts_links(); ?>  <?php if(!empty(get_the_category()[0]->name)){ ?>in <a href="<?php echo get_category_link(get_the_category()[0]->cat_ID); ?>"><?php echo esc_html( get_the_category()[0]->name ); ?></a><?php } ?></p>
                    <?php if(!empty(get_the_terms($post->ID, 'issue'))) { ?><p class="search-result-meta"><span class="search-results-meta-print-edition">In Print Edition:</span> <a href=""><?php echo get_the_terms($post->ID, 'issue')[0]->name; ?></a></p><?php } ?>
                </div>
                <a class="search-result-image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('three-two'); ?></a>
            </div>

            <?php endwhile; ?>
            
            <?php the_posts_navigation(array(
                'prev_text' => '<i class="far fa-chevron-left"></i> Older Results',
                'next_text' => 'Newer Results <i class="far fa-chevron-right"></i>',
            )); ?>

            <?php endif; ?>
        </div>

    </main>
<?php get_footer(); ?>