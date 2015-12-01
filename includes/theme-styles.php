<?php

function theme_styles() {

	if (!is_admin()) {
		wp_register_style('fontawesome', THEME_CSS . '/font-awesome.min.css', array(), '4.5.0', 'all');
		wp_enqueue_style('fontawesome');

		wp_register_style('main-css', get_bloginfo('stylesheet_url'), '', '', 'all');
		wp_enqueue_style('main-css');

		wp_register_style('social-css',  THEME_CSS . '/social.css', '', '', 'all');
		wp_enqueue_style('social-css');
		
		wp_register_style('shortcodes-css',  THEME_CSS . '/shortcodes.css', '', '', 'all');
		wp_enqueue_style('shortcodes-css');

	}
}
add_action('init', 'theme_styles');
?>