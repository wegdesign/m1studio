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

	// If using image radio buttons, define a directory path
	$imagepath = get_template_directory_uri() . '/images/';
	
	$options = array();

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


	$options[] = array('name' =>'Background', 'desc' => __('Select the Background Image for Body and assign its Properties according to your requirements.', 'm1studio'), 'id' => 'theme_bg' , 'type' => 'upload');
	
	$options[] = array('name' => __('Topbar Left', 'm1studio'), 
						'desc' => __('Custom HTML and Text that will appear in the Topbar in Left side.', 'm1studio'), 
						'id' => 'topbar_left', 
						'std' => '', 
						'type' => 'textarea');
	
	
	//Music Settings
	$options[] = array( 'name' => 'Music Settings', 'type' => 'heading' );
	
	
	$options[] = array('name' => __('Services Settings', 'm1studio'), 'type' => 'heading');
	
	$options[] = array('name' => __('Message Services', 'm1studio'), 
						'desc' => __('Enter the message that you wish the display on the Services Page', 'm1studio'), 
						'id' => 'message_services', 
						'std' => '', 
						'type' => 'textarea');
	
	
	
	
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
