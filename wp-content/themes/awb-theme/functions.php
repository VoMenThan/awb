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
	wp_enqueue_script('mt_awb_jquery_matchheight', $jsUrl.'jquery.matchHeight-min.js', array(), '1.0', true);
	wp_enqueue_script('mt_awb_jquery_mCustomScrollbar_concat_min', $jsUrl.'jquery.mCustomScrollbar.concat.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_awb_wowjs', $jsUrl.'wow.min.js', array(), '1.0', true);
	wp_enqueue_script('mt_awb_videojs', $jsUrl.'video.js', array(), '1.0', true);
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

?>