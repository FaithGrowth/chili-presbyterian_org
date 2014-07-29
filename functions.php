<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'First Presbyterian Church, Chili, NY' );
define( 'CHILD_THEME_URL', 'http://chili-presbyterian.org/' );
define( 'CHILD_THEME_VERSION', '1.0' );

//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Remove support for Genesis footer
remove_action( 'genesis_footer', 'genesis_do_footer' );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array('header', 'nav', 'subnav', 'site-inner', 'footer-widgets', 'footer'));

//* Add support for widget areas
genesis_register_sidebar( array(
    'id'            => 'home-slider',
    'name'          => __( 'Home Slider', 'chili-pres' ),
    'description'   => __( 'This is the slider section on the home page.', 'chili-pres' ),
) );

genesis_register_sidebar( array(
    'id'            => 'home-events',
    'name'          => __( 'Home Events', 'chili-pres' ),
    'description'   => __( 'This is the upcoming events page on the home page.', 'chili-pres' ),
) );

genesis_register_sidebar( array(
    'id'            => 'home-service-times',
    'name'          => __( 'Home Service Times', 'chili-pres' ),
    'description'   => __( 'This is the service times area on the home page.', 'chili-pres' ),
) );
?>