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
					
					
					?>
					<div class="custompost_entry">				
						<div class="custompost_details">					
							<div class="col_fourth">
							
							<?php if( has_post_thumbnail()){ ?>
							<div class="custompost_thumb port_img">
							<?php
								echo '<figure>'. theme_resize($post->ID,'','470','470','', $img_alt_title  ). '</figure>';
								echo '<div class="hover_type">';
								echo '<a data-rel="prettyPhoto" class="hoverimage" href="'.$imagesrc[0].'" title="'. get_the_title().'"></a>';
								echo '</div>';
							?>
							</div>
							<?php } ?>
							
							<div class="album-details">
							
								
								<div class="album-meta"><span>Release Date </span> <?php the_modified_date(); ?></div>
								<?php if($audio_tag != '' ) { ?>
								<div class="album-meta">
									<span>Tags </span><?php echo get_the_term_list( $post->ID, 'promos_tag', '','' );?>
								</div>
								<?php } ?>
								
								<?php if($audio_genre_music != '' ) { ?>
									<div class="album-meta"><span>Genere </span>
									<?php echo get_the_term_list( $post->ID, 'promos_cat', '','' );?>
								</div>
								<?php } ?>
							
							</div>
							
							
							</div>
							<div class="col_three_fourth end">
								<h2 class="album-title "><?php the_title(); ?></h2>
								
							</div>
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