<!DOCTYPE html>
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
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<title><?php
/*
 * Print the <title> tag based on what is being viewed.
 */
global $page, $paged;
wp_title('|', true, 'right');

// Add the blog name.
bloginfo('name');

// Add the blog description for the home/front page.
$site_description = get_bloginfo('description', 'display');
if ($site_description && (is_home() || is_front_page())) {
	echo " | $site_description";
}

// Add a page number if necessary:
if ($paged >= 2 || $page >= 2) {
	echo ' | ' . sprintf(__('Page %s', 'musicplay'), max($paged, $page));
}
	?></title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo THEME_URI; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<link rel="shortcut icon" href="" type="image/x-icon" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="boxed">
		<div id="wrapper">
			<div class="topbar">
				<div class="inner">
					<div class="topbar_left ">
						
					</div>
					<div class="topbar_right">
						<div id="social-icons">
							<!-- social -->
						</div>
					</div>
				</div><!-- /inner -->
			</div><!-- /topbar -->
			<div class="clear"></div>
			<div id="header" class="header clearfix">
				<div class="inner">

					<div class="logo">
						
					</div>
					<!-- /logo -->
		
					<div class="primarymenu menuwrap">
						
					</div>
				</div>
				<!-- /inner-->
			</div>
			<!-- /header -->
			<div id="ajaxwrap">
			<?php if ( is_front_page() ){ ?>
				<div id="featured_slider">
					<div class="staticslider">
	
						<figure><img src="<?php echo THEME_URI;?>/images/static_image.jpg" height="430" alt="staticslider"/></figure>
		
					</div><!-- .staticslider -->
				</div><!-- #featured_slider -->
				
			<?php 
				wp_reset_query();
				} ?>
			
			<?php if(!is_front_page()){?>
			<div id="subheader">
				<div class="inner">
					<div class="subdesc">
						<h1 class="page-title"></h1>
						<div class="customtext"></div>
					</div>
					<div class="breadcrumbs">
    					<?php if(function_exists('bcn_display'))
    						{
        						bcn_display();
    						}?>
					</div>
				</div>
			</div>
			<?php } ?>
			
			<div id="main" class="fullwidth">