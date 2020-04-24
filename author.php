<?php
// Set the Current Author Variable $author
$author = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$args = array(
    'post_type' => array('column','post'),
    'author' => get_queried_object_id(), // this will be the author ID on the author page
    'showposts' => 10
);
$custom_posts = new WP_Query( $args );
if ( $custom_posts->have_posts() ):
    while ( $custom_posts->have_posts() ) : $custom_posts->the_post();
        // your markup
    endwhile;
else:
    // nothing found
endif;
?>

<?php get_header(); ?>

<main id="author">

<div class="author-header">
    <div class="author-header-avatar">
        <?php echo get_avatar($author->user_email , '96'); ?>
    </div>
    <div class="author-header-info">
        <div class="author-name"<?php if(empty($author->description)) { ?> style="margin: 0;"<?php } ?>>
            <h2><?php echo $author->display_name; ?></h2>
            <ul class="author-social">
                <?php if(!empty($author->user_url)) { ?><li><a href="<?php echo $author->user_url; ?>"><i class="fas fa-link"></i></a></li><?php } ?>
                <?php if(!empty(get_user_meta($author->ID,'twitter',true))) { ?><li><a href="<?php echo 'https://twitter.com/' . get_user_meta($author->ID,'twitter',true); ?>"><i class="fab fa-twitter"></i></a></li><?php } ?>
                <?php if(!empty(get_user_meta($author->ID,'facebook',true))) { ?><li><a href="<?php echo get_user_meta($author->ID,'facebook',true); ?>"><i class="fab fa-facebook-f"></i></a></li><?php } ?>
                <?php if(!empty(get_user_meta($author->ID,'instagram',true))) { ?><li><a href="<?php echo 'https://instagram.com/' . get_user_meta($author->ID,'instagram',true); ?>"><i class="fab fa-instagram"></i></a></li><?php } ?>
                <?php if(!empty($author->user_email)) { ?><li><a href="mailto:<?php echo $author->user_email; ?>"><i class="fas fa-envelope"></i></a></li><?php } ?>
            </ul>
        </div>
        <p><?php echo $author->user_description; ?></p>
    </div>
</div>
 
<?php if ( $custom_posts->have_posts() ) : while ( $custom_posts->have_posts() ) : $custom_posts->the_post(); ?>

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
<?php else: ?>
<p><?php _e('No posts by this author.'); ?></p>
 
<?php endif; ?>

</main>

<?php get_footer(); ?>