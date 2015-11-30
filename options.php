<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option('stylesheet');
	$themename = preg_replace("/\W/", "_", strtolower($themename));

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	$shortname = "theme";

	$optLogotype = array('imagelogo' => __('Logo', 'm1studio'), 'textlogo' => __('Title', 'm1studio'));

	// Test data
	$test_array = array('one' => __('Prova', 'm1studio'), 'two' => __('Two', 'm1studio'), 'three' => __('Three', 'm1studio'), 'four' => __('Four', 'm1studio'), 'five' => __('Five', 'm1studio'));

	// Multicheck Array
	$multicheck_array = array('one' => __('French Toast', 'm1studio'), 'two' => __('Pancake', 'm1studio'), 'three' => __('Omelette', 'm1studio'), 'four' => __('Crepe', 'm1studio'), 'five' => __('Waffle', 'm1studio'));

	// Multicheck Defaults
	$multicheck_defaults = array('one' => '1', 'five' => '1');

	// Background Defaults
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');

	// Typography Defaults
	$typography_defaults = array('size' => '15px', 'face' => 'georgia', 'style' => 'bold', 'color' => '#bada55');

	// Typography Options
	$typography_options = array('sizes' => array('6', '12', '14', '16', '20'), 'faces' => array('Helvetica Neue' => 'Helvetica Neue', 'Arial' => 'Arial'), 'styles' => array('normal' => 'Normal', 'bold' => 'Bold'), 'color' => false);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category -> cat_ID] = $category -> cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ($options_tags_obj as $tag) {
		$options_tags[$tag -> term_id] = $tag -> name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page -> ID] = $page -> post_title;
	}
	
	

	// If using image radio buttons, define a directory path
	$imagepath = get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array('name' => __('General', 'm1studio'), 'type' => 'heading');
	

	$options[] = array('name' => __('Input Text Mini', 'm1studio'), 'desc' => __('A mini text input field.', 'm1studio'), 'id' => 'example_text_mini', 'std' => 'Default', 'class' => 'mini', 'type' => 'text');

	$options[] = array('name' => __('Input Text ', 'm1studio'), 'desc' => __('A text input field.', 'm1studio'), 'id' => 'example_text', 'std' => 'Default Value', 'type' => 'text');

	$options[] = array('name' => __('Textarea', 'm1studio'), 'desc' => __('Textarea description.', 'm1studio'), 'id' => 'example_textarea', 'std' => 'Default Text', 'type' => 'textarea');

	$options[] = array('name' => __('Input Select Small', 'm1studio'), 'desc' => __('Small Select Box.', 'm1studio'), 'id' => 'example_select', 'std' => 'three', 'type' => 'select', 'class' => 'mini', //mini, tiny, small
	'options' => $test_array);

	$options[] = array('name' => __('Input Select Wide', 'm1studio'), 'desc' => __('A wider select box.', 'm1studio'), 'id' => 'example_select_wide', 'std' => 'two', 'type' => 'select', 'options' => $test_array);

	$options[] = array('name' => __('Select a Category', 'm1studio'), 'desc' => __('Passed an array of categories with cat_ID and cat_name', 'm1studio'), 'id' => 'example_select_categories', 'type' => 'select', 'options' => $options_categories);

	if ($options_tags) {
		$options[] = array('name' => __('Select a Tag', 'm1studio'), 'desc' => __('Passed an array of tags with term_id and term_name', 'm1studio'), 'id' => 'example_select_tags', 'type' => 'select', 'options' => $options_tags);
	}

	$options[] = array('name' => __('Select a Page', 'm1studio'), 'desc' => __('Passed an array of pages with ID and post_title', 'm1studio'), 'id' => 'example_select_pages', 'type' => 'select', 'options' => $options_pages);

	$options[] = array('name' => __('Input Radio (one)', 'm1studio'), 'desc' => __('Radio select with default options "one".', 'm1studio'), 'id' => 'example_radio', 'std' => 'one', 'type' => 'radio', 'options' => $test_array);

	$options[] = array('name' => __('Example Info', 'm1studio'), 'desc' => __('This is just some example information you can put in the panel.', 'm1studio'), 'type' => 'info');

	$options[] = array('name' => __('Input Checkbox', 'm1studio'), 'desc' => __('Example checkbox, defaults to true.', 'm1studio'), 'id' => 'example_checkbox', 'std' => '1', 'type' => 'checkbox');

	$options[] = array('name' => __('Advanced Settings', 'm1studio'), 'type' => 'heading');

	$options[] = array('name' => __('Check to Show a Hidden Text Input', 'm1studio'), 'desc' => __('Click here and see what happens.', 'm1studio'), 'id' => 'example_showhidden', 'type' => 'checkbox');

	$options[] = array('name' => __('Hidden Text Input', 'm1studio'), 'desc' => __('This option is hidden unless activated by a checkbox click.', 'm1studio'), 'id' => 'example_text_hidden', 'std' => 'Hello', 'class' => 'hidden', 'type' => 'text');

	$options[] = array('name' => __('Uploader Test', 'm1studio'), 'desc' => __('This creates a full size uploader that previews the image.', 'm1studio'), 'id' => 'example_uploader', 'type' => 'upload');

	$options[] = array('name' => __('Example Image Selector','m1studio'), 'desc' => "Images for layout.", 'id' => "example_images", 'std' => "2c-l-fixed", 'type' => "images", 'options' => array('1col-fixed' => $imagepath . '1col.png', '2c-l-fixed' => $imagepath . '2cl.png', '2c-r-fixed' => $imagepath . '2cr.png'));

	$options[] = array('name' => __('Example Background', 'm1studio'), 'desc' => __('Change the background CSS.', 'm1studio'), 'id' => 'example_background', 'std' => $background_defaults, 'type' => 'background');

	$options[] = array('name' => __('Multicheck', 'm1studio'), 'desc' => __('Multicheck description.', 'm1studio'), 'id' => 'example_multicheck', 'std' => $multicheck_defaults, // These items get checked by default
	'type' => 'multicheck', 'options' => $multicheck_array);

	$options[] = array('name' => __('Colorpicker', 'm1studio'), 'desc' => __('No color selected by default.', 'm1studio'), 'id' => 'example_colorpicker', 'std' => '', 'type' => 'color');

	$options[] = array('name' => __('Typography', 'm1studio'), 'desc' => __('Example typography.', 'm1studio'), 'id' => "example_typography", 'std' => $typography_defaults, 'type' => 'typography');

	$options[] = array('name' => __('Custom Typography', 'm1studio'), 'desc' => __('Custom typography options.', 'm1studio'), 'id' => "custom_typography", 'std' => $typography_defaults, 'type' => 'typography', 'options' => $typography_options);

	$options[] = array('name' => __('Text Editor', 'm1studio'), 'type' => 'heading');

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array('wpautop' => true, // Default
	'textarea_rows' => 5, 'tinymce' => array('plugins' => 'wordpress,wplink'));

	$options[] = array('name' => __('Default Text Editor ', 'm1studio'), 'desc' => sprintf(__('You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'm1studio'), 'http://codex.wordpress.org/Function_Reference/wp_editor'), 'id' => 'example_editor', 'type' => 'editor', 'settings' => $wp_editor_settings);

	$wp_editor_settings = array('wpautop' => true, // Default
	'textarea_rows' => 5, 'media_buttons' => true);

	$options[] = array('name' => __('Additional Text Editor', 'm1studio'), 'desc' => sprintf(__('This editor includes media button.', 'm1studio'), 'http://codex.wordpress.org/Function_Reference/wp_editor'), 'id' => 'example_editor_media', 'type' => 'editor', 'settings' => $wp_editor_settings);

	//Headers
	$options[] = array('name' => __('Headers', 'm1studio'), 'type' => 'heading');
	
	$options[] = array('name' => __('Custom Logo', 'm1studio'), 'desc' => __('If text-based logo is activated, enter the sitename and tagline in the fields below.', 'm1studio'), 'id' => $shortname . "_logo_type", 'std' => 'imagelogo', 'type' => 'select', 'class' => 'mini', //mini, tiny, small
	'options' => $optLogotype);
	$options[] = array('name' => __('Site name', 'm1studio'), 'desc' => __('Put your sitename in here.', 'm1studio'), 'id' => $shortname . "_site_name", 'std' => '', 'type' => 'text');

	$options[] = array('name' => __('Tagline', 'm1studio'), 'desc' => __('Put your tagline in here.', 'm1studio'), 'id' => $shortname . "_tagline", 'std' => '', 'type' => 'text');

	$options[] = array('name' => __('Logo Image', 'm1studio'), 'desc' => __('If image logo is activated, upload the logo image.', 'm1studio'), 'id' => $shortname . "_logo_image", 'type' => 'upload');

	$options[] = array('name' => __('Custom Favicon', 'm1studio'), 'desc' => __('Upload the favicon image.', 'm1studio'), 'id' => $shortname . "_favicon", 'type' => 'upload');


	$options_slider = array();
	$options_slider_obj = find_sliders('post_title');
	foreach ($options_slider_obj as $slider) {
		$options_slider[$slider -> ID] = $slider -> post_title;
	}

	if ($options_slider) {
		$options[] = array('name' => __('Select a Slider', 'm1studio'), 'desc' => __('Select Slider for HomePage', 'm1studio'), 'id' => 'slider_home', 'type' => 'select', 'options' => $options_slider);
	}

	$options[] = array('name' => __('Body Background', 'm1studio'), 'desc' => __('Select the Background Image for Body and assign its Properties according to your requirements.', 'm1studio'), 'id' => 'bg_image', 'std' => $background_defaults, 'type' => 'background');
	
	$options[] = array('name' => __('Topbar Left', 'm1studio'), 
						'desc' => __('Custom HTML and Text that will appear in the Topbar in Left side.', 'm1studio'), 
						'id' => 'topbar_left', 
						'std' => '', 
						'type' => 'textarea');
	
	
	$options[] = array('name' => __('Services', 'm1studio'), 'type' => 'heading');
	
	// Pull all the pages into an array
	$options_services = array();
	$options_services_obj = get_posts(array( 'post_type' => 'services' ) ); 
	$options_services[''] = '-';
	foreach ($options_services_obj as $service) {
		$options_services[$service -> ID] = $service -> post_title;
	}
	
	$options[] = array('name' => __('Select Service ', 'm1studio'), 'desc' => __('Select Your Service', 'm1studio'), 'id' => 'service_1', 'type' => 'select', 'options' => $options_services);
	
	$options[] = array('name' => __('Select Service ', 'm1studio'), 'desc' => __('Select Your Service', 'm1studio'), 'id' => 'service_2', 'type' => 'select', 'options' => $options_services);
	
	$options[] = array('name' => __('Select Service ', 'm1studio'), 'desc' => __('Select Your Service', 'm1studio'), 'id' => 'service_3', 'type' => 'select', 'options' => $options_services);
	
	
	$options[] = array('name' => __('Footer', 'm1studio'), 'type' => 'heading');
	
	
	$options[] = array('name' => __('Copyright Left Content', 'm1studio'), 
						'desc' => __('Enter the content that you wish the display on the footer Left side', 'm1studio'), 
						'id' => 'copyright_left', 
						'std' => '', 
						'type' => 'textarea');
						
	$options[] = array('name' => __('Copyright Right Content', 'm1studio'), 
						'desc' => __('Enter the content that you wish the display on the footer Right side', 'm1studio'), 
						'id' => 'copyright_right', 
						'std' => '', 
						'type' => 'textarea');
	
	$options[] = array('name' => __('Google Analytics', 'm1studio'), 
						'desc' => __('Paste your Google Analytics code here which starts from tag script here. This will be added into the footer of your theme.', 'm1studio'), 
						'id' => 'google_analytics', 
						'std' => '', 
						'type' => 'textarea');

	//Social
	$options[] = array('name' => __('Sociable', 'm1studio'), 'type' => 'heading');

	$options[] = array('name' => __('Facebook Link', 'm1studio'), 'id' => 'facebook', 'std' => '', 'type' => 'text');
	$options[] = array('name' => __('Tumblr Link', 'm1studio'), 'id' => 'tumblr', 'std' => '', 'type' => 'text');
	$options[] = array('name' => __('Linkedin Link', 'm1studio'), 'id' => 'linkedin', 'std' => '', 'type' => 'text');
	$options[] = array('name' => __('Twitter Link', 'm1studio'), 'id' => 'twitter', 'std' => '', 'type' => 'text');
	$options[] = array('name' => __('Google-plus Link', 'm1studio'), 'id' => 'google-plus', 'std' => '', 'type' => 'text');
	$options[] = array('name' => __('Reddit Link', 'm1studio'), 'id' => 'reddit', 'std' => '', 'type' => 'text');
	$options[] = array('name' => __('YouTube Link', 'm1studio'), 'id' => 'youtube', 'std' => '', 'type' => 'text');
	$options[] = array('name' => __('Pinterest Link', 'm1studio'), 'id' => 'pinterest', 'std' => '', 'type' => 'text');
	$options[] = array('name' => __('GitHub Link', 'm1studio'), 'id' => 'github', 'std' => '', 'type' => 'text');
	$options[] = array('name' => __('Your Mail', 'm1studio'), 'id' => 'envelope', 'std' => '', 'type' => 'text');
	$options[] = array('name' => __('SoundCloud', 'm1studio'), 'id' => 'soundcloud', 'std' => '', 'type' => 'text');

	$options[] = array('name' => __('Sharing', 'm1studio'), 'type' => 'heading');

	$options[] = array('name' => __('Google+', 'm1studio'), 'desc' => __('Check this to enable Google+ Icon for Post Sharing.', 'm1studio'), 'id' => 'google-plus_enabled', 'std' => '0', 'type' => 'checkbox');
	$options[] = array('name' => __('Linkedin', 'm1studio'), 'desc' => __('Check this to enable Linkedin Icon for Post Sharing.', 'm1studio'), 'id' => 'linkedin_enabled', 'std' => '0', 'type' => 'checkbox');
	$options[] = array('name' => __('Pinterest', 'm1studio'), 'desc' => __('Check this to enable Pinterest Icon for Post Sharing.', 'm1studio'), 'id' => 'pinterest_enabled', 'std' => '0', 'type' => 'checkbox');
	$options[] = array('name' => __('Twitter', 'm1studio'), 'desc' => __('Check this to enable Twitter Icon for Post Sharing.', 'm1studio'), 'id' => 'twitter_enabled', 'std' => '0', 'type' => 'checkbox');
	$options[] = array('name' => __('Facebook', 'm1studio'), 'desc' => __('Check this to enable Facebook Icon for Post Sharing.', 'm1studio'), 'id' => 'facebook_enabled', 'std' => '0', 'type' => 'checkbox');


	return $options;
}
