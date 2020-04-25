<?php get_template_part('load/head'); ?>

<body id="<?php print get_stylesheet(); ?>" <?php body_class(); ?>>

<header id="header">
    <div class="masthead-outer">
        <section id='masthead'>
            <div class="masthead-left">
                <p class="tagline">The Voice of the Students</p>
                <?php
                $api_url = "http://api.openweathermap.org/data/2.5/weather?id=5327684&lang=en&units=imperial&APPID=47697438d4ba438b6cd5f5786542d2ef";

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $api_url);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);

                curl_close($ch);
                $data = json_decode($response);
                $currentTime = time();
                ?>
                <?php if( $data->cod !== 429) { ?>
                <p class="date"><?php echo date('F j, Y'); ?> - Feels Like <?php echo round($data->main->feels_like); ?>°F</p>
                <?php } ?>
            </div>
            <div class="masthead-center">
                <div class="logo-outer">
                    <a href="/">
                        <img class="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-light.svg">
                    </a>
                </div>
            </div>
            <div class="masthead-right">
                <a class="button outline light" href="/subscribe">Subscribe</a>
            </div>
        </section>
    </div>
    <div class="navigation-outer">
        <section id="navigation">
            <div class="navigation-left">
                <?php get_search_form(); ?>
            </div>
            <div class="navigation-center">
                    <?php wp_nav_menu( array(
                        'menu' => wp_get_nav_menu_name( 'sections' ),
                        'menu_class' => "menu-items",
                        'container' => "nav",
                        'container_id' => "menu",
                        'depth' => "1",
                    ) ); ?>
                <div class="mobile-menu">
                    <a href="/?s="><i class="fas fa-search"></i></a>
                    <a href="/?s=" class="mobile-menu-search">Search</a>
                    <?php foreach( wp_get_nav_menu_items( wp_get_nav_menu_name( 'sections' ) ) as $menu_item ) { ?>
                    <a href="<?php echo $menu_item->url; ?>" class="mobile-menu-item"><?php echo $menu_item->title; ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="navigation-right">
                <a href="/login">Login</a>
            </div>
        </section>
    </div>
</header>

<?php get_template_part('php/posts/universal/sticky'); ?>