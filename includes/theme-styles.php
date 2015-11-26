<?php

function theme_styles() {

	if (!is_admin()) {
		wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0', 'all');
		wp_enqueue_style('fontawesome');

		wp_register_style('main-css', get_bloginfo('stylesheet_url'), '', '', 'all');
		wp_enqueue_style('main-css');

		wp_register_style('social-css', get_template_directory_uri() . '/css/social.css', '', '', 'all');
		wp_enqueue_style('social-css');
		
		wp_register_style('shortcodes-css', get_template_directory_uri() . '/css/shortcodes.css', '', '', 'all');
		wp_enqueue_style('shortcodes-css');
		
		wp_register_style('animate-css', get_template_directory_uri() . '/css/animate.css', '', '', 'all');
		wp_enqueue_style('animate-css');

	}
}
add_action('init', 'theme_styles');
?>