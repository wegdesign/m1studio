<?php
/**
 * The Header for our theme.
 * Includes the header.php template file.
 */

get_header();
 ?>

	<div id="primary" class="pagemid">
	<div class="inner">

		<div class="content-area">

			<?php $format = get_post_format($post -> ID); ?>
			<?php
				if (false === $format) { $format = 'standard';
				}
 ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<div class="post_content">
					<?php if( $format != 'link' && $format != 'quote' && $format != 'aside') { ?>
						<h2 class="entry-title">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr(get_the_title()); ?>"><?php the_title(); ?></a>
						</h2>
					<?php } ?>
					<div class="entry-content">
						
						<?php get_template_part('includes/post-type/' . $format); ?>
							
						<?php if ( $format != 'quote' ){ ?>
							<div class="post-entry">
								<div class="post-excerpt">
									<?php the_excerpt(); ?>
								</div>
							</div>
						
						<?php } ?>	
					</div>
				<?php if ( get_option( 'atp_postmeta' ) != "on" ) { ?>
					<div class="post-info">
						<?php if( $format != 'aside' && $format != 'quote' ){?>
							<?php echo theme_postmeta(); ?>
						<?php } ?>
						<?php if ( $format != 'quote'   && $format != 'aside' ) { ?>
							<a class="more-link" href="<?php the_permalink() ?>">Read More</a>
						<?php  } ?>
					</div><!-- .post-info -->
				<?php } ?>		
				</div>
			</div>

			
			
			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php previous_post_link('&larr; %link') ?></div>
				<div class="nav-next"><?php next_post_link('%link &rarr;') ?></div>
			</div><!-- #nav-below-->
			
			

			<?php endwhile; ?>
				
			<?php else: ?>

			<?php '<p>' . __('Sorry, no posts matched your criteria.', 'm1studio') . '</p>'; ?>

			<?php endif; ?>

		</div>	<!-- .content-area -->
	</div><!-- inner -->
	</div><!-- #primary.pagemid -->


<?php get_footer(); ?>