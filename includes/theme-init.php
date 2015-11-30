<?php
add_action( 'after_setup_theme', 'theme_setup' );

if ( ! function_exists( 'theme_setup' ) ):

function theme_setup() {
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' );
	}

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'menus' );

	register_nav_menus( array(
    	'primary-menu' => 'Primary Menu'
	) );
	
	add_filter('widget_text', 'do_shortcode');	
}
endif;
?>