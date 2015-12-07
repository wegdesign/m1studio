<?php

function aggiungi_script() {

	wp_enqueue_script('jquery');
	
	
	wp_register_script('prettyphoto-js', get_template_directory_uri().'/js/jquery.prettyPhoto.js', array('jquery'), '3.1.6', true);
	wp_enqueue_script('prettyphoto-js');	
	
 	if(!is_admin()) {
  
   		wp_register_script('script', get_template_directory_uri().'/js/custom.js', array('jquery'), '1.0', false);
  		wp_enqueue_script('script');
  
 	}


}

  
add_action( 'wp_enqueue_scripts', 'aggiungi_script' );


?>