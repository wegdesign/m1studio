<?php

function create_gallerypost_type() {
	
		$labels = array(
			'name'				=> __('Gallery'),
			'singular_name'		=> __('All Gallery'),
			'add_new'			=> __('Add New Gallery'),
			'add_new_item'		=> __('Add New Gallery'),
			'edit_item'			=> __('Edit Gallery'),
			'new_item'			=> __('New Item'),
			'view_item'			=> __('View Gallery Item'),
			'search_items'		=> __('Search Gallery Item'),
			'not_found'			=> __('Nothing found'),
			'not_found_in_trash'=> __('Nothing found in Trash'),
			'parent_item_colon'	=> '',
			'all_items' 		=> __( 'All Galleries'),
		);

		$args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'exclude_from_search'	=> false,
			'show_ui'				=> true,
			'capability_type'		=> 'post',
			'hierarchical'			=> false,
			'rewrite'				=> array( 'with_front' => true ),
			'query_var'				=> false,
			'menu_position'			=> null,
			'menu_icon'				=> '',
			'has_archive' 			=> true,   
			'supports'				=> array('title','thumbnail', 'page-attributes','editor'),
			'taxonomies' 			=> array('gallery_type')
		); 
		register_post_type( 'gallery' , $args );
	}
	add_action('init', 'create_gallerypost_type');


register_taxonomy( "gallery_type", 'gallery', array(
		'hierarchical'		=> true,
		'labels' => array(
			'name' 				=> __( 'Gallery Categories', 'taxonomy general name' ),
			'singular_name' 	=> __( 'Gallery Categories', 'taxonomy singular name' ),
			'search_items' 		=> __( 'Search Gallery'),
			'parent_item' 		=> __( 'Parent Gallery'),
			'parent_item_colon' => __( 'Parent Gallery:' ),
			'edit_item' 		=> __( 'Edit Gallery'),
			'update_item' 		=> __( 'Update Gallery Category'),
			'add_new_item' 		=> __( 'Add Gallery Category'),
			'new_item_name' 	=> __( 'New Gallery '),
			'gallery_name' 	    => __( 'Gallery Categories' ),
		),
		'show_ui'			=> true,
		'query_var'			=> true,
		'rewrite'			=> true,
		'show_admin_column' => true,
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



if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_566197e36ddfe',
	'title' => 'Gallery',
	'fields' => array (
		array (
			'key' => 'field_5661a4969a9ca',
			'label' => 'gallery',
			'name' => 'gallery',
			'prefix' => '',
			'type' => 'gallery',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'min' => '',
			'max' => '',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'gallery',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;





?>