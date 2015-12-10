<!-- Inizio Header -->
<!doctype html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<title><?php 	bloginfo('name'); ?></title>
		<meta name="description" content="<?php  get_bloginfo('description', 'display'); ?>">
		<?php if(theme_get_option('theme_favicon')) { ?>
			<link rel="shortcut icon" href="<?php echo theme_get_option('theme_favicon'); ?>" type="image/x-icon" /> 
		<?php } else { ?>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/images/m1-studio-favicon.ico'?>" type="image/x-icon" />
		<?php } ?>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php theme_background(); ?>
		<div id="boxed">
			<div id="wrapper">
				<div class="topbar">
					<div class="inner">
						<div class="topbar_left ">
							<?php if(theme_get_option( 'topbar_left' ) != ""){ echo theme_get_option( 'topbar_left' ); }?>
						</div>
						<div class="topbar_right">
							<?php echo theme_social_link(); ?>
						</div>
					</div><!-- inner -->
				</div><!-- topbar -->
				<div class="clear"></div>
				<div id="header" class="header clearfix">
					<div class="inner">

						<div class="logo">
							<?php theme_logo(); ?>
						</div>
						<!-- logo -->
		
						<div class="primarymenu menuwrap">
							<?php theme_primary_menu(); ?>
						</div>
					</div>
					<!-- inner-->
				</div>
				<!-- header -->
				<div id="ajaxwrap">
					<?php if ( is_front_page() ){ 
						
						theme_slider_home();
						
					?>
					
					
					<div class="frontpage_teaser">
						<div class="inner">
							<?php home_services(); ?>
						</div>
					</div>
					
					<?php
						wp_reset_query();
					}
					?>
					
					<?php sub_header(); ?>
					
					<div id="main" class="fullwidth">
				
				
	