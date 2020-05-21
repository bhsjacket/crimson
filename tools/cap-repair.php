<?php

function create_terms_for_posts() {

    global $coauthors_plus, $wp_post_types;

    if($_GET['abc'] == 'abc') {
        echo 'working';
    }

    if($_GET['abc'] == 'xyz') {

        // Cache these to prevent repeated lookups
        $authors = array();
        $author_terms = array();

        $args = array(
            'order'            => 'ASC',
            'orderby'          => 'ID',
            'post_type'         => $coauthors_plus->supported_post_types,
            'posts_per_page'    => 100,
            'paged'             => 1,
            'update_meta_cache' => false,
            );

        $posts = new WP_Query( $args );
        $affected = 0;
        $count = 0;
        $total_posts = $posts->found_posts;
        echo( "Now inspecting or updating {$posts->found_posts} total posts." );
        echo '<br>';
        echo '<br>';
        while ( $posts->post_count ) {

            foreach ( $posts->posts as $single_post ) {

                $count++;

                $terms = cap_get_coauthor_terms_for_post( $single_post->ID );
                if ( empty( $terms ) ) {
                    echo( sprintf( 'No co-authors found for post #%d.', $single_post->ID ) );
                    echo '<br>';
                    echo '<br>';
                }

                if ( ! empty( $terms ) ) {
                    echo( "{$count}/{$posts->found_posts}) Skipping - Post #{$single_post->ID} '{$single_post->post_title}' already has these terms: " . implode( ', ', wp_list_pluck( $terms, 'name' ) ) );
                    echo '<br>';
                    echo '<br>';
                    continue;
                }

                $author = ( ! empty( $authors[ $single_post->post_author ] ) ) ? $authors[ $single_post->post_author ] : get_user_by( 'id', $single_post->post_author );
                $authors[ $single_post->post_author ] = $author;

                $author_term = ( ! empty( $author_terms[ $single_post->post_author ] ) ) ? $author_terms[ $single_post->post_author ] : $coauthors_plus->update_author_term( $author );
                $author_terms[ $single_post->post_author ] = $author_term;

                wp_set_post_terms( $single_post->ID, array( $author_term->slug ), $coauthors_plus->coauthor_taxonomy );
                echo( "{$count}/{$total_posts}) Added - Post #{$single_post->ID} '{$single_post->post_title}' now has an author term for: " . $author->user_nicename );
                echo '<br>';
                $affected++;
            }

            if ( $count && 0 === $count % 500 ) {
                $this->stop_the_insanity();
                sleep( 1 );
            }

            $args['paged']++;
            $posts = new WP_Query( $args );
        }
        echo( 'Updating author terms with new counts' );
        echo '<br>';
        echo '<br>';
        foreach ( $authors as $author ) {
            $coauthors_plus->update_author_term( $author );
        }

        echo( "Done! Of {$total_posts} posts, {$affected} now have author terms." );
        echo '<br>';
        echo '<br>';

    }

}