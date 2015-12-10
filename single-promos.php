<?php
/** 
 * The Header for our theme.
 * Includes the header.php template file. 
 */

get_header(); ?>
<?php global $default_date; ?>
	<div id="primary" class="pagemid">
		<div class="inner">
			<div class="content-area">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>			
				<div <?php post_class( 'custompost-single' );?> id="post-<?php the_ID(); ?>">
					<?php
					$audio_tag = get_the_terms( $post->ID , 'promos_tag');
					$audio_genre_music = get_the_terms( $post->ID , 'promos_cat' );
					$img_alt_title 	= get_the_title();
						
					$imagesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' );
					$music_image = aq_resize( $imagesrc[0], '60', '60', true );
					$permalink = get_permalink( get_the_id());
					$playlisttitle = get_the_title( get_the_id());
					$download_audio = get_field( "download_audio" , $post->ID);
					$buy_audio = get_field( "buy_audio" , $post->ID);
					
					?>
					<div class="custompost_entry">				
						<div class="custompost_details">					
							<div class="col_fourth">
							
							<?php if( has_post_thumbnail()){ ?>
							<div class="custompost_thumb port_img">
							<?php
								echo '<figure>'. theme_resize($post->ID,'','470','470','', $img_alt_title  ). '</figure>';
								echo '<div class="hover_type">';
								echo '<a data-rel="prettyPhoto" class="hoverimage" href="'.$imagesrc[0].'" title="'. get_the_title().'"><i class="fa fa-search fa-2x services-icon"></i></a>';
								echo '</div>';
							?>
							</div>
							<?php } ?>
							
							<div class="album-details">
								
								
								
								<?php if($audio_tag != '' ) { ?>
								<div class="album-meta">
									<span>Tags </span><?php echo get_the_term_list( $post->ID, 'promos_tag', '','' );?>
								</div>
								<?php } ?>
								
								
							
								<?php echo share_link(); ?>
							</div>
							
							
							</div>
							<div class="col_three_fourth end">
								<span class="album-meta"><?php the_modified_date(); ?> </span>
								<h2 class="album-title "><?php the_title(); ?></h2>
								<?php if($audio_genre_music != '' ) { ?>
									<div class="album-meta"><span><?php echo get_the_term_list( $post->ID, 'promos_cat', '','' );?></span></div>
								<?php } ?>
								<div class="album-list">
									<div style="background: #222;">
								<?php 
									$traccia_audio = get_field( "traccia_audio" , $post->ID);
									if($traccia_audio != ""){
										echo do_shortcode('[audio mp3="' . $traccia_audio . '"][/audio]');
									}
								?>
									</div>
									<?php
									
									if($download_audio == 1 || $buy_audio == 1){
									?> 
									<div class="mp3options">
										
										<?php if($buy_audio == 1){?>
											<span class="buy"><a href="mailto:localhost@prova.it"><i class="fa fa-shopping-cart fa-lg"></i></a></span>
										<?php } ?>
										<?php if($download_audio == 1){?>
											<span class="download"  ><a href="<?php echo $traccia_audio; ?>"><i class="fa fa-download fa-lg"></i></a></span>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
								
								
								
							</div>
							<?php the_content(); ?>	
						</div>
					</div>					
				</div>
				<?php endwhile; ?>

				<?php else: ?>
					<?php '<p>'.__('Sorry, no projects matched your criteria.', 'musicplay').'</p>';?>
				<?php endif; ?>
			</div>
		</div>
	</div>







<?php get_footer(); ?>