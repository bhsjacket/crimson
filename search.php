<?php get_header(); ?>
    <main id="search">
        <div id="form">
            <form method="get" action="<?php echo home_url('/'); ?>">
                <input type="text" class="search-field" name="s" placeholder="Search..." value="<?php the_search_query(); ?>">
                <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'crimson' ); ?>" />
            </form>
            <a class="advanced-search">Advanced Search</a>
            <div id="advanced-search-popup">
                <div>
                    <p>You can search for keywords, articles, writers, photographers, and illustrators. Our search supports quotation marks to match an exact word or phrase. You can also use AND and OR operators to refine your search. When searching for a person, try putting their name in quotation marks for best results. Results in <span style="background-color: #800000; color: white;">red</span> were A1 stories online.</p>
                    <p class="close">Got it!</p>
                </div>
            </div>
        </div>

        <div id="results">
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

            <div class="search-result <?php if(has_post_thumbnail() == false) { echo 'no-image'; }; ?> <?php if(get_the_terms($post->ID, 'syndication')[0]->slug == 'front-feature') { echo 'front-feature plus animated_xy'; }; ?>">
                <p class="search-result-date"><?php echo get_the_date(); ?></p>
                <div class="search-result-article">
                    <h2 class="search-result-article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p class="search-result-meta">By <?php coauthors_posts_links(); ?>  <?php if(!empty(get_the_category()[0]->name)){ ?>in <a href="<?php echo get_category_link(get_the_category()[0]->cat_ID); ?>"><?php echo esc_html( get_the_category()[0]->name ); ?></a><?php } ?></p>
                    <?php if(!empty(get_the_terms($post->ID, 'issue'))) { ?><p class="search-result-meta"><span class="search-results-meta-print-edition">In Print Edition:</span> <?php echo get_the_terms($post->ID, 'issue')[0]->name; ?></p><?php } ?>
                </div>
                <a class="search-result-image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('three-two'); ?></a>
            </div>

            <?php endwhile; ?>
            
            <?php the_posts_navigation(array(
                'prev_text' => '<i class="far fa-chevron-left"></i> Older Results',
                'next_text' => 'Newer Results <i class="far fa-chevron-right"></i>',
            )); ?>

            <?php else: ?>
                <p class="no-results">No results found.</p>
            <?php endif; ?>
        </div>

    </main>
<?php get_footer(); ?>