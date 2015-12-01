<?php

// Inizializzazione della funzione
add_action( 'init', 'create_promospost_type');

function create_promospost_type() {
	
	$labels = array(
            	'name' 					=> 'Promo', 
            	'singular_name'			=> 'Promo', 
            	'all_items' 			=> 'Tutti i Promo', 
            	'add_new' 				=> 'Aggiungi nuovo Promo', 
            	'add_new_item' 			=> 'Aggiungi nuovo Promo', 
            	'edit_item' 			=> 'Modifica Promo', 
            	'new_item' 				=> 'Nuovo Promo', 
            	'view_item' 			=> 'Visualizza Promo', 
            	'search_items' 			=> 'Cerca Promo', 
            	'not_found' 			=> 'Nessun Promo trovato', 
            	'not_found_in_trash' 	=> 'Nessun Promo trovato nel cestino', 
            	'parent_item_colon' 	=> ''
     );
	
	$args = array(
			'labels'				=> $labels,
			'description' 			=> 'Raccolta di Promo del portale',				
			'public'				=> true,
			'publicly_queryable' 	=> true, 										
			'exclude_from_search'	=> false,
			'show_ui'				=> true,
			'capability_type'		=> 'post',
			'hierarchical'			=> false,
			'has_archive' 			=> true,
			'rewrite'				=> array('slug'=> 'promos'),
			'query_var' 			=> true,
			'menu_position'			=> null,
			'menu_icon'				=> '',  
			'supports'				=> array('title','thumbnail', 'page-attributes','editor'),
			'taxonomies' 			=> array('promos_cat','promos_tag')
	); 
	flush_rewrite_rules( false );
		register_post_type( 'promos' , $args );

} 



register_taxonomy( 'promos_cat', 'promos', array(
		'hierarchical'		=> true,
		'labels' => array(
			'name' 				=> __( 'Genere', 'taxonomy general name' ),
			'singular_name' 	=> __( 'Genere', 'taxonomy singular name' ),
			'search_items'		=> __( 'Cerca Genere'),
			'parent_item'		=> __( 'Genitore ' ),
			'parent_item_colon'	=> __( 'Genitore:' ),
			'edit_item'			=> __( 'Modifica Genere '),
			'update_item'		=> __( 'Aggiorna Genere'),
			'add_new_item'		=> __( 'Aggiungi Genere'),
			'new_item_name'		=> __( 'Nuovo Genere '),
			'albums_name'		=> __( 'Genere '),
		),
		'show_ui'			=> true,
		'query_var'			=> true,
		'show_ui'			=> true,
		'show_admin_column' => true,
		'query_var'			=> true,
		'rewrite'			=> array( 'slug' => 'genere' ),
		'sort' 				=> true,
		'args' 				=> array( 'orderby' => 'menu_order' ),
		'has_archive' => true,

	));
	
	
	register_taxonomy( 'promos_tag', 'promos', array(
		'hierarchical'		=> false,
		'labels' => array(
			'name' 				=> __( 'Tag', 'taxonomy general name' ),
			'singular_name' 	=> __( 'Tag', 'taxonomy singular name' ),
			'search_items'		=> __( 'Cerca Tag'),
			'parent_item'		=> __( 'Genitore ' ),
			'parent_item_colon'	=> __( 'Genitore:' ),
			'edit_item'			=> __( 'Modifica Tag '),
			'update_item'		=> __( 'Aggiorna Tag'),
			'add_new_item'		=> __( 'Aggiungi Tag'),
			'new_item_name'		=> __( 'Nuovo Tag '),
			'albums_name'		=> __( 'Tag '),
		),
		'show_ui'			=> true,
		'query_var'			=> true,
		'show_ui'			=> true,
		'query_var'			=> true,
		'show_admin_column' => true,
		'rewrite'			=> array( 'slug' => 'genere' ),
		'sort' 				=> true,
		'args' 				=> array( 'orderby' => 'menu_order' ),
		'has_archive' => true,

	));
	
	
	global $columns;
	function promos_columns( $columns ) {
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
	function manage_promos_columns( $name ) {
		global $wpdb, $wp_query,$post;
		switch ( $name ) {
			case 'thumbnail':
					echo the_post_thumbnail('thumbnail');
				break;
			case 'promos_cat':
				$terms = get_the_terms($post->ID, 'promos_cat');
				//If the terms array contains items... (dupe of core)
				if ( !empty($terms) ) {
					//Loop through terms
					foreach ( $terms as $term ){
						//Add tax name & link to an array
						$post_terms[] = esc_html(sanitize_term_field('name', $term->name, $term->term_id, '', 'edit'));
					}
					//Spit out the array as CSV
					echo implode( ', ', $post_terms );
				} else {
					//Text to show if no terms attached for post & tax
					echo '<em>No terms</em>';
				}
				break;
			
			case 'id':
					echo get_the_ID();
				break;
		}
	} 
	add_action('manage_promos_posts_custom_column', 'manage_promos_columns', 10, 2);
	add_filter('manage_edit-promos_columns', 'promos_columns');



if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_promo',
		'title' => 'Promo',
		'fields' => array (
			array (
				'key' => 'field_565dd5694a33e',
				'label' => 'File Audio',
				'name' => 'file_audio',
				'type' => 'file',
				'instructions' => 'Inserisci il file Audio',
				'required' => 1,
				'save_format' => 'url',
				'library' => 'all',
			),
			array (
				'key' => 'field_565dd58b4a33f',
				'label' => 'Prezzo',
				'name' => 'prezzo',
				'type' => 'number',
				'default_value' => 0,
				'placeholder' => 0,
				'prepend' => '€',
				'append' => ',00',
				'min' => 0,
				'max' => '',
				'step' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'promos',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


 
?>