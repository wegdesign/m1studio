<?php 
/** 
 * The Header for our theme.
 * Includes the header.php template file. 
 */

get_header(); ?>

	<div id="primary" class="pagemid">
	<div class="inner">

		<div class="content-area">

			<?php $format = get_post_format($post->ID); ?>
			<?php if ( false === $format ) { $format = 'standard'; } ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div <?php post_class('post');?> id="post-<?php the_ID(); ?>">
				<div class="post_content">

					<?php 
					if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
						global $post_id;
						$img_alt_title 	= get_the_title();
					?>
					<div class="postimg">
        				<figure>
							<a title="<?php get_the_title(); ?>" href="<?php the_permalink(); ?>">
								<?php echo atp_resize($post_id,'','670','300','imgborder', $img_alt_title );?>
							</a>
						</figure>
					</div>
					<?php } ?>

					<?php if( $format != 'quote') { ?>
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } ?>

					
						
					<div class="post-entry">
						<?php the_content();?>

						<?php the_tags('<div class="tags">'.__('<strong>Tags</strong>','m1studio').': ',',&nbsp; ','</div>');?>
						<?php get_template_part('utils/share','link'); ?>
					</div><!-- .post-entry -->

				</div><!-- .post-content -->
			</div><!-- #post-<?php the_ID(); ?> -->

			
			
			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php previous_post_link('&larr; %link') ?></div>
				<div class="nav-next"><?php next_post_link('%link &rarr;') ?></div>
			</div><!-- #nav-below-->
			
			

			<?php endwhile; ?>
				
			<?php else: ?>

			<?php '<p>'.__('Sorry, no posts matched your criteria.', 'm1studio').'</p>';?>

			<?php endif; ?>

		</div>	<!-- .content-area -->
	</div><!-- inner -->
	</div><!-- #primary.pagemid -->


<?php get_footer(); ?>