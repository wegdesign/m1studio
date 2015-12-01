<?php

// Inizializzazione della funzione
add_action( 'init', 'create_service_post_type');

function create_service_post_type() {
	
	$labels = array(
            	'name' 					=> 'Servizi', 
            	'singular_name'			=> 'Servizo', 
            	'all_items' 			=> 'Tutti i Servizi', 
            	'add_new' 				=> 'Aggiungi nuovo Servizio', 
            	'add_new_item' 			=> 'Aggiungi nuovo Servizio', 
            	'edit_item' 			=> 'Modifica Servizio', 
            	'new_item' 				=> 'Nuovo Servizio', 
            	'view_item' 			=> 'Visualizza Servizio', 
            	'search_items' 			=> 'Cerca Servizio', 
            	'not_found' 			=> 'Nessun Servizio trovato', 
            	'not_found_in_trash' 	=> 'Nessun Servizio trovato nel cestino', 
            	'parent_item_colon' 	=> ''
     );
	
	$args = array(
			'labels'				=> $labels,
			'description' 			=> 'Raccolta di Servizi del portale',				
			'public'				=> true,
			'publicly_queryable' 	=> true, 										
			'exclude_from_search'	=> false,
			'show_ui'				=> true,
			'capability_type'		=> 'post',
			'hierarchical'			=> false,
			'has_archive' 			=> 'true',
			'rewrite'				=> array('slug'=> 'services', 'with_front' => true ),
			'query_var' 			=> true,
			'menu_position'			=> null,
			'menu_icon'				=> '',  
			'supports'				=> array('title', 'editor'),
			
	); 
		register_post_type( 'services' , $args );

} 


//change menu icon
add_action( 'admin_head', 'add_menu_icons_service' );
function add_menu_icons_service(){
?>

<style>
	#adminmenu .menu-icon-services div.wp-menu-image:before {
		content: '\f145';
	}
</style>
<?php
}

	global $columns;
	function services_columns( $columns ) {
		$cols_start = array_slice( $columns, 0, 1, true );
		$cols_end   = array_slice( $columns, 1, null, true );
		$custom_cols = array_merge(
			$cols_start,
			array( 
				'id'				=> __('ID\'s'),
				'icon' 				=> __('Icon')
			),
			$cols_end
		);
		return $custom_cols;
	}
	function manage_services_columns( $name ) {
		global $wpdb, $wp_query,$post;
		switch ( $name ) {
			case 'icon':
					$sp1_icon = get_post_meta( $post->ID, 'fa_field_icon', true );
					echo do_shortcode('[servicesicon align="left" icon="' . $sp1_icon . '"]');
				break;
			case 'id':
					echo get_the_ID();
				break;
		}
	} 
	add_action('manage_services_posts_custom_column', 'manage_services_columns', 10, 2);
	add_filter('manage_edit-services_columns', 'services_columns');
?>


