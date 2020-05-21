<!-- Website by Jerome Paulos -->

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#800000" />
    <meta name="description" content="The Voice of the Students">
    <meta name="keywords" content="berkeley, berkeley high, bhs, jacket, berkeley high jacket, the jacket, berkeley high school, berkeley california, california, ca, uc berkeley, berkeley ca, berkeley news, news, high school news, high school newspaper, berkeley high school newspaper, berkeley newspaper, berkeley high newspaper">

    <link href="<?php echo get_template_directory_uri(); ?>/fonts/fonts.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=DM+Serif+Display:400,400i|PT+Sans:400,400i,700,700i|PT+Serif:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/posts/universal.css<?php echo '?=' . uniqid(); ?>" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/style.css<?php echo '?=' . uniqid(); ?>" rel="stylesheet">

    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome/css/regular.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome/css/solid.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php if(is_front_page()) { ?>
    <link href="<?php echo get_template_directory_uri(); ?>/css/homepage.css<?php echo '?=' . uniqid(); ?>" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
<?php } ?>

	<?php if(is_singular(array('post'))) { ?>
    <link href="<?php echo get_template_directory_uri(); ?>/css/posts/<?php echo get_field('post_template') ?>.css<?php echo '?=' . uniqid(); ?>" rel="stylesheet">
	<?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
    <script src="<?php echo get_template_directory_uri(); ?>/includes/zoom.js"></script>

<?php if( get_post_type() == 'page' ) { ?>
    <link href="<?php echo get_template_directory_uri(); ?>/css/page.css<?php echo '?=' . uniqid(); ?>">
<?php } ?>

<!-- Begin wp_head() -->
<?php wp_head(); ?>
<!-- End wp_head() -->

</head>