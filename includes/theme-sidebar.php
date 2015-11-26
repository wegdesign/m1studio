<?php

if(function_exists('register_sidebar')){

		/**
		 * Footer Column Widgets
		 *-----------------------------
		 */
		 // footer column1
		register_sidebar(array(
			'name'			=> 'Footer Column1',
			'id'			=> 'footercolumn1',
			'description'	=> __('Select only one widget which will appear on your Footer column1', 'ATP_ADMIN_SITE'),
			'before_widget'	=> '<aside id="%1$s" class="widget clearfix %2$s">',
			'after_widget'	=> '</aside>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
		));
		// footer column2
		register_sidebar(array(
				'name'			=> 'Footer Column2',
				'id'			=> 'footercolumn2',
				'description'	=> __('Select only one widget which will appear on your Footer column2', 'ATP_ADMIN_SITE'),
				'before_widget'	=> '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
		));
		// footer column3
		register_sidebar(array(
				'name'			=> 'Footer Column3',
				'id'			=> 'footercolumn3',
				'description'	=> __('Select only one widget which will appear on your Footer column3', 'ATP_ADMIN_SITE'),
				'before_widget'	=> '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
		));
		// footer column4
		register_sidebar(array(
				'name'			=> 'Footer Column4',
				'id'			=> 'footercolumn4',
				'description'	=> __('Select only one widget which will appear on your Footer column4', 'ATP_ADMIN_SITE'),
				'before_widget'	=> '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
		));
		
	}
?>