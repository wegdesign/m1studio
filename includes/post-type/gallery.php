<?php

// Inizializzazione della funzione
add_action( 'init', 'create_gallerypost_type');

function create_gallerypost_type() {
	
	$labels = array(
            	'name' 					=> 'Galleria', 
            	'singular_name'			=> 'Galleria', 
            	'all_items' 			=> 'Tutte le Gallerie', 
            	'add_new' 				=> 'Aggiungi nuova Galleria', 
            	'add_new_item' 			=> 'Aggiungi nuova Galleria', 
            	'edit_item' 			=> 'Modifica Galleria', 
            	'new_item' 				=> 'Nuova Galleria', 
            	'view_item' 			=> 'Visualizza Galleria', 
            	'search_items' 			=> 'Cerca Galleria', 
            	'not_found' 			=> 'Nessuna Galleria trovata', 
            	'not_found_in_trash' 	=> 'Nessuna Galleria trovata nel cestino', 
            	'parent_item_colon' 	=> ''
     );
	
	$args = array(
			'labels'				=> $labels,
			'description' 			=> 'Raccolta di Galleria del portale',				
			'public'				=> true,
			'publicly_queryable' 	=> true, 										
			'exclude_from_search'	=> false,
			'show_ui'				=> true,
			'capability_type'		=> 'post',
			'hierarchical'			=> false,
			'has_archive' 			=> true,
			'rewrite'				=> array('slug'=> 'gallery'),
			'query_var' 			=> true,
			'menu_position'			=> null,
			'menu_icon'				=> '',  
			'supports'				=> array('title','thumbnail', 'page-attributes','editor'),
			'taxonomies' 			=> array('gallery_cat')
	); 
	flush_rewrite_rules( false );
		register_post_type( 'gallery' , $args );

} 



register_taxonomy( 'gallery_cat', 'gallery', array(
		'hierarchical'		=> true,
		'labels' => array(
			'name' 				=> __( 'Categorie', 'taxonomy general name' ),
			'singular_name' 	=> __( 'Categorie', 'taxonomy singular name' ),
			'search_items'		=> __( 'Cerca Categorie'),
			'parent_item'		=> __( 'Genitore ' ),
			'parent_item_colon'	=> __( 'Genitore:' ),
			'edit_item'			=> __( 'Modifica Categoria '),
			'update_item'		=> __( 'Aggiorna Categoria'),
			'add_new_item'		=> __( 'Aggiungi Categoria'),
			'new_item_name'		=> __( 'Nuova Categoria '),
			'albums_name'		=> __( 'Categorie '),
		),
		'show_ui'			=> true,
		'query_var'			=> true,
		'show_ui'			=> true,
		'show_admin_column' => true,
		'query_var'			=> true,
		'rewrite'			=> array( 'slug' => 'categorie' ),
		'sort' 				=> true,
		'args' 				=> array( 'orderby' => 'menu_order' ),
		'has_archive' => true,

	));
	
	

	global $columns;
	function gallery_columns( $columns ) {
		$cols_start = array_slice( $columns, 0, 1, true );
		$cols_end   = array_slice( $columns, 1, null, true );
		$custom_cols = array_merge(
			$cols_start,
			array( 
				'id'		=> __('ID\'s'),
				'thumbnail' => __('Thumbnails')
			),
			$cols_end
		);
		return $custom_cols;
	}
function manage_gallery_columns( $name ) {
		global $wpdb, $wp_query,$post,$default_date;
		switch ( $name ) {
			case 'gallery_id':
					echo get_the_ID();
					break;

			case 'thumbnail':
						echo the_post_thumbnail(array(100,100));
						break;
		}
	} 
	add_action('manage_gallery_posts_custom_column', 'manage_gallery_columns', 10, 2);
	add_filter('manage_edit-gallery_columns', 'gallery_columns');


?>