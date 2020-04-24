<?php get_header(); ?>

<main id="columns">

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

    <div class="search-result<?php if(get_post_type() == 'page') { echo ' page-result '; }; ?><?php if(has_post_thumbnail() == false &&  get_post_type() !== 'column') { echo ' no-image '; }; ?><?php if(get_post_type() == 'column') { echo ' column-image '; }; ?><?php if(get_the_terms($post->ID, 'syndication')[0]->slug == 'front-feature') { echo ' front-feature plus animated_xy'; }; ?>">
        <?php if(get_post_type() !== 'page') { ?>
        <p class="search-result-date"><?php echo get_the_date(); ?></p>
        <?php } ?>
        <div class="search-result-article">
            <h2 class="search-result-article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php if(get_post_type() !== 'page') { ?><p class="search-result-meta"><?php if(get_post_type() == 'column') { echo 'Column by '; } else { echo 'By '; }; ?><?php coauthors_posts_links(); ?>  <?php if(!empty(get_the_category()[0]->name)){ ?>in <a href="<?php echo get_category_link(get_the_category()[0]->cat_ID); ?>"><?php echo esc_html( get_the_category()[0]->name ); ?></a><?php } ?></p><?php } ?>
            <?php if(!empty(get_the_terms($post->ID, 'issue'))) { ?><p class="search-result-meta"><span class="search-results-meta-print-edition">In Print Edition:</span> <?php echo get_the_terms($post->ID, 'issue')[0]->name; ?></p><?php } ?>
        </div>
        <a class="search-result-image" href="<?php the_permalink(); ?>"><?php if(get_post_type() == 'column' && has_post_thumbnail() == false) { echo '<img src="' . get_avatar_url(get_coauthors()[0]->ID) . '">'; } else { the_post_thumbnail('three-two'); } ?></a>
    </div>

    <?php endwhile; ?>

    <?php the_posts_navigation(array(
        'prev_text' => '<i class="far fa-chevron-left"></i> Older Columns',
        'next_text' => 'Newer Columns <i class="far fa-chevron-right"></i>',
    )); ?>

    <?php else: ?>
        <p class="no-results">No columns found.</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>