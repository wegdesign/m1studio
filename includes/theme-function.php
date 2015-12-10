<?php

// Theme Post Meta
if (!function_exists("theme_postmeta")) {

	function theme_postmeta() {
		global $format;
		ob_start();
		echo '<span>';
		the_time(get_option('date_format'));
		echo '</span> / <span>By ';
		the_author_posts_link();
		echo '</span> / <span>In ';
		the_category(', ');
		echo '</span>';
		$out .= ob_get_clean();
		return $out; ;
	}

}
// End Theme Post Meta

//Theme Pagination
if (!function_exists("theme_pagination")) {

	function theme_pagination($pages = '', $range = 2) {

		$showitems = ($range * 2) + 1;
		global $paged;
		if (empty($paged))
			$paged = 1;
		if ($pages == '') {
			global $wp_query;
			$pages = $wp_query -> max_num_pages;
			if (!$pages) {
				$pages = 1;
			}
		}
		$out = '';
		if (1 != $pages) {
			$out .= '<div class="clear"></div>';
			$out .= '<div class="pagination pagination2">';
			$out .= '<span class="pages extend">';
			$out .= "Page " . $paged . " of " . $pages;
			$out .= '</span>';
			//echo $out;

			if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
				$out .= "<a href='" . get_pagenum_link(1) . "'>&laquo;</a>";
			if ($paged > 1 && $showitems < $pages)
				$out .= "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a>";
			for ($i = 1; $i <= $pages; $i++) {
				if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
					$out .= ($paged == $i) ? "<span class='current'>" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a>";
				}
			}
			if ($paged < $pages && $showitems < $pages)
				$out .= "<a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a>";
			if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
				$out .= "<a href='" . get_pagenum_link($pages) . "'>&raquo;</a>";
			$out .= "</div>\n";
		}
		return $out;
	}

}
//End Theme Pagination

//Localization Text
if (!function_exists("theme_localize")) {
	function theme_localize($text = "", $before = "", $after = "") {
		$output = $before . $text . $after;
		return $output;
	}

}
//End Localization Text

//Theme Image Resize
if (!function_exists("theme_resize")) {
	function theme_resize($atppostid = null, $src = null, $width, $height, $class = null, $alt = null) {
		if ($class) {

			$class = ' class="' . $class . '"';

		}
		if ($atppostid) {

			$title = ' title="' . get_the_title($atppostid) . '"';

		} else {

			$title = '';

		}
		if ($alt != '') { $title = ' alt="' . $alt . '"';
		}

		if ($src == "") {

			$imagesrc = wp_get_attachment_image_src(get_post_thumbnail_id($atppostid), 'full', false, '');

			$src = $imagesrc[0];

		}
		$out = '';
		$image = aq_resize($src, $width, $height, true);
		if ($image != '') {
			$out .= '<img  ' . $class . ' ' . $title . ' src="' . $image . '">';
		}
		return $out;
	}

}
//End Theme Image Resize

//Theme Aq Resize
if (!function_exists("aq_resize")) {
	function aq_resize($url, $width, $height = null, $crop = null, $single = true) {

		//validate inputs
		//if(!$url OR !$width ) return false;

		//define upload path & dir
		$upload_info = wp_upload_dir();
		$upload_dir = $upload_info['basedir'];
		$upload_url = $upload_info['baseurl'];

		//check if $img_url is local
		//if(strpos( $url, $upload_url ) === false) return false;

		//define path of image
		$rel_path = str_replace($upload_url, '', $url);
		$img_path = $upload_dir . $rel_path;

		//check if img path exists, and is an image indeed
		//if( !file_exists($img_path) OR !getimagesize($img_path) ) return false;

		//get image info
		$info = pathinfo($img_path);
		$ext = @$info['extension'];
		list($orig_w, $orig_h) = @getimagesize($img_path);

		//get image size after cropping
		$dims = image_resize_dimensions($orig_w, $orig_h, $width, $height, $crop);
		$dst_w = $dims[4];
		$dst_h = $dims[5];

		//use this to check if cropped image already exists, so we can return that instead
		$suffix = "{$dst_w}x{$dst_h}";
		$dst_rel_path = str_replace('.' . $ext, '', $rel_path);
		$destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

		if (!$dst_h) {
			//can't resize, so return original url
			$img_url = $url;
			$dst_w = $orig_w;
			$dst_h = $orig_h;
		}
		// else check if cache exists
		elseif (file_exists($destfilename) && getimagesize($destfilename)) {
			$img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
		}
		// else, we resize the image and return the new resized image url
		else {

			// Note: This pre-3.5 fallback check will edited out in subsequent version
			if (function_exists('wp_get_image_editor')) {

				$editor = wp_get_image_editor($img_path);

				if (is_wp_error($editor) || is_wp_error($editor -> resize($width, $height, $crop)))
					return false;

				$resized_file = $editor -> save();

				if (!is_wp_error($resized_file)) {
					$resized_rel_path = str_replace($upload_dir, '', $resized_file['path']);
					$img_url = $upload_url . $resized_rel_path;
				} else {
					return false;
				}

			} else {

				$resized_img_path = image_resize($img_path, $width, $height, $crop);
				// Fallback foo
				if (!is_wp_error($resized_img_path)) {
					$resized_rel_path = str_replace($upload_dir, '', $resized_img_path);
					$img_url = $upload_url . $resized_rel_path;
				} else {
					return false;
				}

			}

		}

		//return the output
		if ($single) {
			//str return
			$image = $img_url;
		} else {
			//array return
			$image = array(0 => $img_url, 1 => $dst_w, 2 => $dst_h);
		}

		return $image;
	}

}
//End Theme Aq Resize

//Theme Social Link

if (!function_exists("theme_social_link")) {

	function theme_social_link() {

		$array_social = array('facebook', 'tumblr', 'linkedin', 'twitter', 'google-plus', 'reddit', 'youtube', 'pinterest', 'github', 'envelope', 'soundcloud');
		$social_html = "";
		foreach ($array_social as $social) {
			$social_link = theme_get_option($social);
			if ($social_link != "") {
				$social_html .= "<a class='icon-link round-corner " . $social . "'><i class='fa fa-" . $social . "'></i></a>";
			}
		}
		return $social_html;

	}

}


if(!function_exists("share_link")){
	function share_link(){
		
	echo '<strong>'._e('Share','m1studio').':</strong>';
	
	// Google+
	if ( theme_get_option( 'google-plus_enabled' ) == '1' ){ ?>
		<a class="icon-link round-corner google-plus" href="http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;annotation=<?php the_title(); ?>" >
			<i class="fa fa-google-plus"></i>
		</a>
	<?php }
	// Linkdedin
	if ( theme_get_option('linkedIn_enabled') == '1' ) {
 	?>
 		<a class="icon-link round-corner linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;summary=<?php the_title(); ?>" >
			<i class="fa fa-linkedin"></i>
		</a>
	<?php }
	// Pinterest
	if ( theme_get_option('pinterest_enabled') == '1') {
 	?>
 		<a class="icon-link round-corner pinterest" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&title=<?php the_title(); ?> ">
			<i class="fa fa-pinterest"></i>
		</a>
	<?php }
	// Twitter
	if ( theme_get_option('twitter_enabled') == '1' ) {
	?>
 		<a class="icon-link round-corner twitter" href="http://twitter.com/home?status=<?php the_title(); ?> - <?php the_permalink(); ?>">
			<i class="fa fa-twitter"></i>
		</a>
	<?php }
	// Facebook
	if ( theme_get_option('facebook_enabled') == '1' ){
	?>
		<a class="icon-link round-corner facebook" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>"> 
			<i class="fa fa-facebook"></i>
		</a>
	<?php }
	}
}
if(!function_exists("find_sliders")){
	function find_sliders($sort_key = 'post_title'){
		
			$args = array(
	            'post_type' => 'ml-slider',
	            'post_status' => 'publish',
	            'orderby' => $sort_key,
	            'suppress_filters' => 1, // wpml, ignore language filter
	            'order' => 'ASC',
	            'posts_per_page' => -1
	        );
			
			 $all_sliders = get_posts($args);
			 
			 return $all_sliders;
	}
}


if(!function_exists("home_services")){
	function home_services(){
		
		$service_1 = theme_get_option('service_1');
		$service_2 = theme_get_option('service_2');
		$service_3 = theme_get_option('service_3');
		
		if($service_1 != "-" && $service_2 != "-" && $service_3 != "-" ){
			
			//print service 1
			$sp1 = get_post($service_1);
			$sp1_title = $sp1->post_title;
			$sp1_content = $sp1->post_content;
			$sp1_icon = get_post_meta( $sp1->ID, 'fa_field_icon', true );
			
			//print service 2
			$sp2 = get_post($service_2);
			$sp2_title = $sp2->post_title;
			$sp2_content = $sp2->post_content;
			$sp2_icon = get_post_meta( $sp2->ID, 'fa_field_icon', true );
			
			//print service 3
			$sp3 = get_post($service_3);
			$sp3_title = $sp3->post_title;
			$sp3_content = $sp3->post_content;
			$sp3_icon = get_post_meta( $sp3->ID, 'fa_field_icon', true );
			
			echo '<div style="padding:40px 0 ;">'.do_shortcode('
					[one_third][servicesicon align="left" icon="' . $sp1_icon . '" title="' . $sp1_title . '"]' . $sp1_content . '[/servicesicon] [/one_third] 
					[one_third][servicesicon align="left" icon="' . $sp2_icon . '" title="' . $sp2_title . '"]' . $sp2_content . '[/servicesicon] [/one_third]	
					[one_third_last][servicesicon align="left" icon="' . $sp3_icon . '" title="' . $sp3_title . '"]' . $sp3_content . '[/servicesicon] [/one_third_last]
				') . '</div>';
			
			
			
		}
		
	}	
}


function get_attachment_id_from_src ($image_src) {
 
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    $id = $wpdb->get_var($query);
    return $id;
 
}

if(!function_exists("theme_post_img")){
	function theme_post_img(){
		$post_cover = theme_get_option('theme_post_cover_image');
		if($post_cover == ""){
			$post_cover = get_template_directory_uri() . '/images/post_cover.jpg';
		}
		return $post_cover;
	}
}


?>