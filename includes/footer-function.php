<?php


if(!function_exists("theme_print_js_prettyphoto")){
	
	function theme_print_js_prettyphoto(){
	?>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		runprettyPhoto();
	});
	
	function runprettyPhoto(){
		//=================================== PRETTYPHOTO ===================================//
		jQuery('a[data-rel]').each(function() {jQuery(this).attr('rel', jQuery(this).data('rel'));});
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({
			animationSpeed:'slow',
			theme:'dark_square', /* light_rounded / dark_rounded / light_square / dark_square / facebook / pp_default */
			gallery_markup:'',
			social_tools: false,
			slideshow:2000
		});
	}
	</script>
	<?php
	}
	add_action("theme_foot","theme_print_js_prettyphoto",2);
}

if(!function_exists("theme_foot")){
	function theme_foot(){
		do_action("theme_foot");
	}
}
add_action("wp_footer","theme_foot",20);


?>