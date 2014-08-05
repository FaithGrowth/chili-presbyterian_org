<?php add_action( 'genesis_before_entry', 'chili_add_custom_image'); ?>
<?php function chili_add_custom_image() {
	$image = get_field('custom_image');
	if ($image) {
		echo '<img src="' . $image['url'] . '" />';
	}
} ?>
<?php genesis(); ?>