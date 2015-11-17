<!-- Inizio Header -->
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html lang="en"> <![endif]-->
<!--[if IE 7]>    <html lang="en"> <![endif]-->
<!--[if IE 8]>    <html lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title><?php 	bloginfo( 'name' ); ?></title>
		<meta name="description" content="<?php  get_bloginfo('description', 'display'); ?>">
		<link rel="shortcut icon" href="" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="boxed">
			<div id="wrapper">
				<div class="topbar">
					<div class="inner">
						<div class="topbar_left ">
							TOPBAR_LEFT
						</div>
						<div class="topbar_right">
							<div id="social-icons">
								<!-- social -->
								social
							</div>
						</div>
					</div><!-- inner -->
				</div><!-- topbar -->
				<div class="clear"></div>
				<div id="header" class="header clearfix">
					<div class="inner">

						<div class="logo">
							LOGO
						</div>
						<!-- logo -->
		
						<div class="primarymenu menuwrap">
							MENU
						</div>
					</div>
					<!-- inner-->
				</div>
				<!-- header -->
				<div id="ajaxwrap">
					<?php if ( is_front_page() ){ ?>
					<div id="featured_slider">
						<div class="staticslider">
							<figure><img src="<?php echo get_template_directory_uri(); ?>/images/static_image.jpg" height="430" alt="staticslider"/></figure>
						</div><!-- staticslider -->
					</div><!-- featured_slider -->
					
					<div class="frontpage_teaser">
						<div class="inner">
							frontpage_teaser
						</div>
					</div>
					
					<?php 
						wp_reset_query();
					} ?>
					
					<?php if(!is_front_page()){?>
						<div id="subheader">
							<div class="inner">
								<div class="subdesc">
									<h1 class="page-title"> 
										<?php $postid = get_the_ID(); 
											  $page = get_post($postid);
											  $title = $page->post_title;
											  echo $title;
										?> 
									</h1>
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
				
				
	