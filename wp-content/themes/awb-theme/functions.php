<?php
define( 'ENV_THEME_DIR', get_stylesheet_directory().'/' );
define( 'ENV_THEME_URL', get_stylesheet_directory_uri().'/' );

define( 'ASSET_URL', get_template_directory_uri().'/assets/' );

define( 'ENV_THEM_INC_DIR', ENV_THEME_DIR . 'inc/' );
define( 'ENV_THEM_WIDGET_DIR', ENV_THEM_INC_DIR . 'widgets/' );


/*======================================================================================================
 * 2. NAP NHUNG TAP TIN JS VAO THEME
 * ======================================================================================================*/

add_action('wp_enqueue_scripts', 'mt_awb_register_js');
function mt_awb_register_js(){
    $jsUrl = get_template_directory_uri().'/assets/js/';
	wp_deregister_script('jquery');
    wp_register_script('jquery', $jsUrl.'jquery.min.js', array(), '1.0', true);
    wp_enqueue_script('jquery');
	wp_enqueue_script('mt_awb_popper_min', $jsUrl.'popper.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_awb_bootstrap', $jsUrl.'bootstrap.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_awb_owl_carousel', $jsUrl.'owl.carousel.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_awb_jquery_mCustomScrollbar_concat_min', $jsUrl.'jquery.mCustomScrollbar.concat.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_awb_wowjs', $jsUrl.'wow.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_awb_videojs', $jsUrl.'video.js', array(), '1.0', true);
	wp_enqueue_script('mt_awb_jquery_fancybox', $jsUrl.'jquery.fancybox.min.js', array(), '1.0', true);
}

/*======================================================================================================
 * 1. NAP NHUNG TAP TIN CSS VAO THEME
 * ======================================================================================================*/

add_action('wp_enqueue_scripts', 'mt_awb_register_style');
function mt_awb_register_style(){
    $cssUrl = get_template_directory_uri().'/assets/css/';

    wp_enqueue_style('mt_awb_bootstrap', $cssUrl.'bootstrap.min.css', array(), '1.0');
    wp_enqueue_style('mt_awb_owl_carousel', $cssUrl.'owl.carousel.min.css', array(), '1.0');
    wp_enqueue_style('mt_awb_owl_theme_default', $cssUrl.'owl.theme.default.min.css', array(), '1.0');
    wp_enqueue_style('mt_awb_owl_theme_green', $cssUrl.'owl.theme.green.min.css', array(), '1.0');
    wp_enqueue_style('mt_awb_font_awesome', $cssUrl.'font-awesome.min.css', array(), '1.0');
    wp_enqueue_style('mt_awb_animate', $cssUrl.'animate.css', array(), '1.0');
    wp_enqueue_style('mt_awb_jquery_mCustomScrollbar_min', $cssUrl.'jquery.mCustomScrollbar.min.css', array(), '1.0');
    wp_enqueue_style('mt_awb_videojs', $cssUrl.'video-js.css', array(), '1.0');
    wp_enqueue_style('mt_awb_jquery_fancybox', $cssUrl.'jquery.fancybox.min.css', array(), '1.0');
    wp_enqueue_style('mt_awb_styles', $cssUrl.'styles.css', array(), '2.0');
}

add_filter('show_admin_bar', '__return_false');

if( ! function_exists( 'uri_segment' ) ) {
    function uri_segment($n = 0){
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
        $full_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $url = str_replace( home_url() . '/', "", $full_url );
        $segments = explode('/', $url);
        return empty( $segments ) ? '' : $segments[$n];
    }
}
add_theme_support( 'post-thumbnails' );



//widget area
function smallenvelop_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Navigation Top', 'smallenvelop' ),
        'id' => 'header-sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'smallenvelop_widgets_init' );


/*LOAD MORE SEARCH*/
function misha_my_load_more_scripts() {

    global $wp_query;

    // In most cases it is already included on the page and this line can be removed
    wp_enqueue_script('jquery');

    // register our main script but do not enqueue it yet
    wp_register_script( 'my_loadmore', get_template_directory_uri().'/assets/js/myloadmore.js', array('jquery') );

    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ), // WordPress AJAX
        'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ) );

    wp_enqueue_script( 'my_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );



function misha_loadmore_ajax_handler(){

    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';
    $category = $_POST['category'];

    // it is always better to use WP_Query but not here
    query_posts( $args );

    if( have_posts() ) :

        // run the loop
        while( have_posts() ): the_post();

            // look into your theme code how the posts are inserted, but you can use your own HTML of course
            // do you remember? - my example is adapted for Twenty Seventeen theme
            if ($category == 'true'){
                get_template_part( 'template-parts/content', get_post_format() );
            }
            else{
                get_template_part('template-parts/content', 'search');
            }

            // for the test purposes comment the line above and uncomment the below one
            // the_title();


        endwhile;


    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
/* END LOAD MORE SEARCH*/



?>