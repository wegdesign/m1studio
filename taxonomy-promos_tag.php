<?php
/** 
 * The Header for our theme.
 * Includes the header.php template file. 
 */

get_header(); ?>

	
	<div id="primary" class="pagemid">
	<div class="inner">

		<div class="content-area">
		
			<?php
			
			//Columns
			$column_index = 0; $columns = 4;
			if( $columns == '4' ) { $class = 'col_fourth'; }

			//Full Width Album Image Sizes
			if( $columns == '4' ) { $width='470'; $height = '470' ; }
			
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$orderby = 'date';
			$order   = 'ASC';
			$audio_limit	= '-1' ;
			
			

				if (have_posts()) : while ( have_posts()) :  the_post(); 

					
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
				
				<?php echo theme_pagination();  ?>
				
				<?php wp_reset_query();?>

				<?php else : ?>
				
				<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'musicplay' ); ?></p>

				<?php get_search_form(); ?>
				
				<?php endif;?>
				
		</div><!-- .content-area -->
		
	</div><!-- inner -->
	</div><!-- #primary.pagemid -->

<?php get_footer(); ?>