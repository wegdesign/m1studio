<?php

//if no plugin Theme Options
function theme_get_option($name, $default = false) {
	return of_get_option($name, $default);
}

/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * This code allows the theme to work without errors if the Options Framework plugin has been disabled.
 */
if (!function_exists('of_get_option')) {
	function of_get_option($name, $default = false) {

		$optionsframework_settings = get_option('optionsframework');

		// Gets the unique option id
		$option_name = $optionsframework_settings['id'];

		if (get_option($option_name)) {
			$options = get_option($option_name);
		}

		if (isset($options[$name])) {
			return $options[$name];
		} else {
			return $default;
		}
	}

}

add_action('admin_head', 'my_admin_custom_styles');
function my_admin_custom_styles() {
	$output_css = '<style type="text/css">
        	.column-id{ width: 30px !important; }
			.column-icon{ width: 30px !important; }
			.column-thumbnail{ width: 100px !important;}
			.column-thumbnail img {width: 80px !important; height: 80px !important;} 
    	</style>';
	echo $output_css;
}
?>
