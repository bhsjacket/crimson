<?php get_header(); ?>

<header id="article-header">
	<img src="<?php echo get_avatar_url( get_coauthors()[0]->ID ); ?>">
    <?php if( $template == 'massive' ) { ?>
        <?php get_template_part('php/posts/massive/featured-image'); ?>
    <?php } ?>
    <?php get_template_part('php/posts/universal/header'); ?>
    <?php if( in_array( $template, array('single', 'slider', 'video') ) ) { ?>
        <?php get_template_part('php/posts/' . get_field('post_template') . '/featured-image'); // Get featured image based on theme folder?>
    <?php } ?>
</header>

<?php get_template_part('php/posts/universal/content'); ?>

<?php get_template_part('php/posts/universal/comments'); ?>
<?php get_template_part('php/posts/universal/footer'); ?>

<?php get_footer(); ?>

<style>
    .byline-in,
    .byline .avatars,
    .byline-by,
	.byline-in + a,
	.sharing {
        display: none;
    }
    #article-header img {
        border-radius: 100%;
        margin: 0 auto;
        display: block;
    }
    #article-header h1 {
        text-align: center;
    }
    #article-header {
        margin-top: 30px;
    }
	.post-meta {
		text-align: center;
	}
	.byline {
		width: 100%!important;
	}
</style>