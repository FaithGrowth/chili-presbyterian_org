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

//* Add custom footer
add_action( 'genesis_footer', 'chili_footer' );
function chili_footer() {
	echo '<h4><em>Rooted in Faith, Growing Together, Caring for the Community</em></h4>';
	echo '<h5>Copyright ' . date('Y') . ' First Presbyterian Church, Chili, NY</h5>';
}

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

//* Add image sizes for slider and page template images
add_image_size( 'slider', 740, 324, true);
add_image_size( 'page', 740);

add_filter( 'image_size_names_choose', 'chili_custom_sizes' );
function chili_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'slider' => __('Slider'),
		'page' => __('Page'),
    ) );
}

//* Remove the layouts that aren't needed
genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
unregister_sidebar( 'sidebar-alt' );

//* Customize the image link default to none
function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

//* Remove comment form HTML tags and attributes
function chili_remove_comment_form_allowed_tags( $defaults ) {
    $defaults['comment_notes_after'] = '';
    return $defaults;
}
add_filter( 'comment_form_defaults', 'chili_remove_comment_form_allowed_tags' );

add_action( 'genesis_entry_header', 'single_post_featured_image', 5 );

function single_post_featured_image() {
	if ( ! is_singular( 'post' ) )
		return;
	$img = genesis_get_image( array( 'format' => 'html', 'size' => genesis_get_option( 'image_size' ), 'attr' => array( 'class' => 'post-image' ) ) );
	printf( '<a href="%s" title="%s" style="float:right;">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $img );	
}
?>