<?php add_action( 'genesis_before_loop', 'chili_add_custom_cat_image'); ?>
<?php function chili_add_custom_cat_image() {
	echo '<img src="/wp-content/themes/chili/images/DSCN6205.png" />';
} ?>
<?php genesis(); ?>