<?php
//print the logo html
if(!function_exists("theme_logo")){
		
	function theme_logo(){
		
		$theme_logo = theme_get_option('theme_logo_image');
		$theme_type = theme_get_option('theme_logo_type');
		$theme_sitename = theme_get_option('theme_site_name');
		$theme_tagline = theme_get_option('theme_tagline');
		
		if($theme_logo == ""){ $theme_logo = get_template_directory_uri() . "/images/logo.png"; } ?>
		
		<?php if($theme_type == 'textlogo'){ ?>
			
			<?php if($theme_sitename == "" && $theme_tagline == ""){?>
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>	</a></span></h1>
				<h2 id="site-description"><?php echo bloginfo( 'description' ); ?></h2>
			<?php } else { ?>
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo $theme_sitename ?></a></span></h1>
				<h2 id="site-description"><?php echo $theme_tagline ?></h2>
			<?php } ?>
		<?php }else { ?>
			<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
				<img src="<?php echo $theme_logo ?>" alt="<?php bloginfo('name'); ?>" />
			</a>
		<?php 
		} 
	}
}


//Primary Menu
if(!function_exists("theme_primary_menu")){
	
	function theme_primary_menu() {
			if (has_nav_menu( 'primary-menu' ) ) {
				wp_nav_menu(array(
					'container'		=> false, 
					'theme_location'=> 'primary-menu',
					'menu_class'	=> 'sf-menu',
					'menu_id'		=> 'primary_menu', 
					'echo'			=> true, 
					'before'		=> '', 
					'after'			=> '',
					'link_before'	=> '', 
					'link_after'	=> '', 
					'depth'			=> 0
					));
			}else{
		}
	}
}


?>