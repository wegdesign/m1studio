<?php

function aggiungi_script() {
 if(!is_admin()) {
  
   wp_register_script('script', get_template_directory_uri().'/js/custom.js', array('jquery'), '1.0', false);
   wp_enqueue_script('script');
  
 }
}
  
add_action( 'wp_enqueue_scripts', 'aggiungi_script' );


?>