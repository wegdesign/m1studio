<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<?php $format = get_post_format($post->ID);?>
	<?php if( false === $format ) { $format = 'standard'; } ?>

	<div <?php post_class();?> id="post-<?php the_ID(); ?>">
		<div class="post_content">
			<?php 
				if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
					global $post_id;
					$img_alt_title 	= get_the_title();
			?>
			<div class="postimg">
        		<figure>
					<a title="<?php printf(__('Permanent Link to %s', 'm1studio'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
						<?php echo atp_resize($post_id,'','670','300','imgborder', $img_alt_title );?>
					</a>
				</figure>
			</div>
			<?php } ?>
			<?php if( $format != 'link' && $format != 'quote' && $format != 'aside') { ?>
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( "Permanent Link to %s", 'm1studio' ), esc_attr( get_the_title() ) ); ?>">
				<?php the_title(); ?></a></h2>
				<?php } ?>

				<?php if ( get_option( 'atp_postmeta' ) != "on" ) { ?>
				<div class="post-info">
					<?php if( $format != 'aside' && $format != 'quote' ){?>
					<?php echo atp_generator('postmetaStyle'); ?>
					<?php } ?>
				</div><!-- .post-info -->
				<?php } ?>
				
				<?php if ( $format != 'quote' ){ ?>
				<div class="post-entry">
					
					<?php the_excerpt(); ?>
					
					<?php if ( $format != 'quote'   && $format != 'aside' ) { ?>
					<a class="more-link" href="<?php the_permalink() ?>"><?php echo atp_localize($atp_readmoretxt, '', '');?></a>
					<?php  } ?>
				
				</div>
				<?php } ?>
		</div>
	</div>


<?php endwhile; ?>

	<div class="navigation">
		<div class="next-posts"><?php next_posts_link(); ?></div>
		<div class="prev-posts"><?php previous_posts_link(); ?></div>
	</div>

<?php else : ?>

	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h1>Not Found</h1>
	</div>
<?php get_search_form(); ?>
<?php endif; ?>