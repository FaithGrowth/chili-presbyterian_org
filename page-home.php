<?php 
/*
* Template Name: Home Page
*/
?>
<?php remove_action('genesis_loop', 'genesis_do_loop'); ?>
<?php add_action('genesis_loop', 'chili_custom_homepage_widget_area'); ?>
<?php function chili_custom_homepage_widget_area() {
	echo '<div id="home">';

		echo '<div class="home-slider">';
		dynamic_sidebar( 'home-slider' );
		echo '</div><!-- end .home-slider -->';
		
		echo '<div class="home-slider">';
		dynamic_sidebar( 'home-events' );
		echo '</div><!-- end .home-slider -->';
		
	echo '</div><!-- end #home -->';
	
} ?>
<?php add_action('genesis_before_content', 'chili_service_times'); ?>
<?php function chili_service_times() {
	echo '<div id="home-service-times">';
		dynamic_sidebar( 'home-service-times' );
	echo '</div>';
} ?>
<?php genesis(); ?>