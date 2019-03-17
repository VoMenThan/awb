<?php

global $post;
get_header();

switch ( $post->post_name ) {

    case 'about-us':
        include( locate_template( 'inc/about-us.php' ) );
        break;

    case 'awb-global':
        include( locate_template( 'inc/awb-global.php' ) );
        break;

    case 'how-we-work':
        include( locate_template( 'inc/how-we-work.php' ) );
        break;

    case 'projects':
        include( locate_template( 'inc/projects.php' ) );
        break;

    case 'post':
        include( locate_template( 'inc/post.php' ) );
        break;


    default:
        include( locate_template( "inc/new-page.php" ) );
        break;

}

get_footer();

