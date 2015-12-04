<?php
add_filter( 'rwmb_meta_boxes', 'klasik_register_meta_boxes' );

function klasik_register_meta_boxes( $meta_boxes )
{
	$imagepath =  get_template_directory_uri() . '/images/';
	$prefix = 'klasik_';
	
	
	$meta_boxes[] = array(
		'title'  => __( 'Upload'),
		'post_types' => array('gallery'),
		'fields' => array(
			array(
				'name'		=> __('Gallery upload'),
				'desc'		=> 'Upload the images you wish to display at the front page',
				'id'		=> 'gallery_upload',
				'title'		=> 'Gallery &amp Title',
				'class'		=> 'gallery',
				'std'		=> '',
				'multiple' 	=> 'true',
				'format'	=> 'jpg,jpeg,gif,png',
				'type'		=> 'multiupload',
			),
		),
	);
	
	$meta_boxes[] = array(
		'id'         => 'postsetting',
		'title'      => __( 'Post Setting', 'klasik' ),
		'post_types' => array( 'post'),
		'context'    => 'normal',
		'priority'   => 'high',
		'autosave'   => true,
		'fields'     => array(
			array(
				'name'  => __( 'Feature on Homepage Slider', 'klasik' ),
				'id'    => "{$prefix}slider_post",
				'desc'  => __( 'Checked this checkbox if you want to show this post as Homepage Slider.', 'klasik' ),
				'type'  => 'checkbox',
			),
			array(
				'type' => 'divider',
				'id'   => 'fake_divider_id', 
			),
			array(
				'name'  => __( 'Disable Blog Info on Single', 'klasik' ),
				'id'    => $prefix.'disable_meta',
				'desc'  => __( 'Checked this checkbox if you want to disable the meta and author information on single page (date, author, categories, etc).', 'klasik' ),
				'type'  => 'checkbox',
			),
		),
	
	);
	

	return $meta_boxes;
}?>