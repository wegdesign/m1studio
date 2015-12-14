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



// PROMO SHORTCODE
function promo_shortcode($atts, $content = null ) {
			
	//Columns
	$column_index = 0; 
	
	
	$columns = theme_get_option('num_promo');
	$class = '';
	$audio_limit	= '4' ;
	if( $columns == '5' ) { $class = 'col_fifth'; $audio_limit	= '5' ;}
	if( $columns == '4' ) { $class = 'col_fourth'; $audio_limit	= '4' ;}
	if( $columns == '3' ) { $class = 'col_third'; $audio_limit	= '3' ;}

	//Full Width Album Image Sizes
	$width='470'; $height = '470' ;
			
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$orderby = 'date';
	$order   = 'DESC';
	
			
	$args = array(
		'post_type' 	 => 'promos',
		'posts_per_page' => $audio_limit, 
		'paged' 		 => $paged,
		'orderby'		 =>	$orderby,
		'order'			 =>	$order
	);
	$wp_query = new WP_Query( $args );

	while (  $wp_query->have_posts()) :  $wp_query->the_post(); 

		$prezzo = get_field( "prezzo" , $post->ID);
		$img_alt_title 		= get_the_title();
		$column_index++;
		$last = ( $column_index == $columns && $columns != 1 ) ? 'end ' : '';
	?>
		<div class="album-list  <?php echo $class. ' ' .$last; ?>" >
			<div class="custompost_entry">	
				<?php if( has_post_thumbnail()){ ?>
				<div class="custompost_thumb port_img">
					<?php 
					echo '<figure>'.theme_resize( $post->ID, '', $width, $height, '', $img_alt_title ).'</figure>';
					echo '<div class="hover_type">';
					echo '<a class="hoveraudio"  href="' .get_permalink(). '" title="' . get_the_title() . '"><i class="fa fa-headphones fa-2x services-icon"></i></a>';
					echo '</div>';
					echo '<span class="imgoverlay"></span>'
					?>
				</div>
				<?php } ?>	
				<div class="album-desc">
					<div class="promo-title">
						<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( "Permanent Link to %s", 'm1studio' ), esc_attr( get_the_title() ) ); ?>"><?php the_title(); ?></a></h2>
					</div>
					<?php if($prezzo != ""){ ?>
					<div class="promo-prezzo">
						<span class="label-text">€ <?php echo $prezzo?>,00</span>
					</div>
					<?php } ?>
				</div><!-- .album-desc-->		
			</div><!-- .custompost_entry -->
		</div><!-- .album_list -->
	
		<?php 
		if( $column_index == $columns ){
			$column_index = 0;
		}?>
		<?php endwhile; ?>
		<div class="clear"></div>
<?php
	}
	add_shortcode('promo', 'promo_shortcode');
	
	
	
?>