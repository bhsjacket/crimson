<?php get_header(); ?>
<?php if(get_field('big_header', 'option') == 'enabled') { ?>
<?php get_template_part('php/front-page/big-header'); ?>
<?php } ?>

<main id="front-page">

<?php
if( have_rows('modules', 'option') ):
    while( have_rows('modules', 'option') ): the_row();

        if( get_row_layout() == 'top_story' ): // Top Story
            if(get_sub_field('content') == 'front-feature') {
                $front_feature = true;
                $category = 'news';
            } else { if(get_sub_field('content') == 'category') {
                $front_feature = false;
                $category = get_sub_field('category')->slug;
            }}
            if(!empty(get_sub_field('pattern'))) {
                if(get_sub_field('pattern_color') == 'light') {
                    $pattern = get_sub_field('pattern') . ' animated_' . get_sub_field('animated');
                } else {
                    $pattern = get_sub_field('pattern') . '-dark animated_' . get_sub_field('animated');
                }
            } else {
                $pattern = 'no-pattern';
            }
            set_query_var('display-info', array(
                'front-feature' => $front_feature,
                'category' => $category,
                'offset' => get_sub_field('offset'),
                'background-color' => get_sub_field('background_color'),
                'text-color' => get_sub_field('text_color'),
                'pattern' => $pattern,
                'image-position' => get_sub_field('image_position'),
                'align' => get_sub_field('align')
            ));
            get_template_part('php/front-page/top-story');

        elseif(get_row_layout() == 'slider'): // Slider
            if(!empty(get_sub_field('pattern'))) {
                if(get_sub_field('pattern_color') == 'light') {
                    $pattern = get_sub_field('pattern');
                } else {
                    $pattern = get_sub_field('pattern') . '-dark';
                }
            } else {
                $pattern = 'no-pattern';
            }
            set_query_var('display-info', array(
                'category' => get_sub_field('category')->slug, // category slug (required)
                'offset' => get_sub_field('offset'), // number (optional)
                'background-color' => get_sub_field('background_color'), // HEX color value (required)
                'text-color' => get_sub_field('text_color'), // HEX color value (required)
                'pattern' => $pattern,
                'posts-position' => 'bottom', // top, bottom (required)
                'full-width' => get_sub_field('full_width'),
                'image-size' => get_sub_field('image_size'),
            ));
            get_template_part('php/front-page/slider');
        
        elseif(get_row_layout() == 'five'): // Five Post Grid
            set_query_var('display-info', array(
                'category' => get_sub_field('category')->slug,
                'offset' => get_sub_field('offset'),
                'posts' => get_sub_field('posts')
            ));
            get_template_part('php/front-page/five');

        elseif(get_row_layout() == 'columnists'):
            get_template_part('php/front-page/columnists');

        elseif(get_row_layout() == 'title'): // Title
            set_query_var('display-info', array(
                'title' => get_sub_field('title'),
                'url' => get_sub_field('title'),
                'icon' => get_sub_field('icon'),
                'icon-color' => get_sub_field('icon_color'),
                'text-color' => get_sub_field('text_color')
            ));
            get_template_part('php/front-page/title');

        elseif(get_row_layout() == 'shattered'): // Shattered/Three-Six Grid
            if(!empty(get_sub_field('pattern'))) {
                if(get_sub_field('pattern_color') == 'light') {
                    $pattern = get_sub_field('pattern');
                } else {
                    $pattern = get_sub_field('pattern') . '-dark';
                }
            } else {
                $pattern = 'no-pattern';
            }
            set_query_var('display-info', array(
                'category' => get_sub_field('category')->slug,
                'offset' => get_sub_field('offset'),
                'background-color' => get_sub_field('background_color'),
                'text-color' => get_sub_field('text_color'),
                'pattern' => $pattern,
            ));
            get_template_part('php/front-page/shattered');

        endif;
    endwhile;
endif;

?>

</main>

<?php get_footer(); ?>