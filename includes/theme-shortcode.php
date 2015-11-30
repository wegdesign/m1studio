<?php


//Sociable
add_shortcode("social", "theme_social_link");

// C O L U M N   L A Y O U T S
//--------------------------------------------------------
	function shortcode_column($atts, $content = null, $code) {
		return '<div class="'.$code.'">' . do_shortcode(trim($content)) . '</div>';
	}
	function shortcode_column_last($atts, $content = null, $code) {
		return '<div class="'.str_replace('_last','',$code).' last">' .do_shortcode(trim($content)) . '</div><div class="clear"></div>';
	}

	add_shortcode('one_half', 'shortcode_column');
	add_shortcode('one_third', 'shortcode_column');
	add_shortcode('one_fourth', 'shortcode_column');
	add_shortcode('one_fifth', 'shortcode_column');
	add_shortcode('one_sixth', 'shortcode_column');

	add_shortcode('two_third', 'shortcode_column');
	add_shortcode('three_fourth', 'shortcode_column');
	add_shortcode('two_fifth', 'shortcode_column');
	add_shortcode('three_fifth', 'shortcode_column');
	add_shortcode('four_fifth', 'shortcode_column');
	add_shortcode('five_sixth', 'shortcode_column');

	add_shortcode('one_half_last', 'shortcode_column_last');
	add_shortcode('one_third_last', 'shortcode_column_last');
	add_shortcode('one_fourth_last', 'shortcode_column_last');
	add_shortcode('one_fifth_last', 'shortcode_column_last');
	add_shortcode('one_sixth_last', 'shortcode_column_last');

	add_shortcode('two_third_last', 'shortcode_column_last');
	add_shortcode('three_fourth_last', 'shortcode_column_last');
	add_shortcode('two_fifth_last', 'shortcode_column_last');
	add_shortcode('three_fifth_last', 'shortcode_column_last');
	add_shortcode('four_fifth_last', 'shortcode_column_last');
	add_shortcode('five_sixth_last', 'shortcode_column_last');
	
	
//  S E R V I C E S  I C O N 
	function services_icon( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'title'		=> '',
			'icon'		=> '',
			'bgcolor'	=> '',
			'color'		=> '',
			'align'		=> 'left',
			'animation' => '',
		), $atts));

		$iconbgcolor 		= $bgcolor 		? ' background-color:'.$bgcolor.';':'';
		$iconcolor 			= $color 		? ' color:'.$color.';':'';

		$extras =	($iconbgcolor!==''||$iconcolor!='') ? ' style="'.$iconbgcolor.$iconcolor.'"':'';

		$iconbgcolor = $bgcolor?' style="background-color:'.$bgcolor.'"':'';
		$iconcolor = $color?' style="color:'.$color.'"':'';

		// Animation Effects
		//--------------------------------------------------------					
		$animation = $animation ? ' data-id="' . $animation . '"' : '';		
		$out  = '<div '.$animation.' class="atp-services iva_anim">';
		$out .= '<div class="services-heading">';
		$out .= '<i class="fa '.$icon.' fa-2x services-icon" '.$extras.'></i>';
		$out .= '<h3>'.$title.'</h3>';
		$out .= '</div>';
		$out .= '<div class="services-content">'.do_shortcode($content).'</div>';
		$out .= '</div>';
		
		return $out;
	}
	add_shortcode('servicesicon', 'services_icon');



?>