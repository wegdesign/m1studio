<?php 

if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<?php $format = get_post_format($post->ID);?>
	
	<?php if( false === $format ) { $format = 'standard'; } ?>

	<div <?php post_class();?> id="post-<?php the_ID(); ?>">
		<div class="post_content">
			<?php if( $format != 'link' && $format != 'quote' && $format != 'aside') { ?>
				<h2 class="entry-title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr( get_the_title() ); ?>"><?php the_title(); ?></a>
				</h2>
			<?php } ?>
			<div class="entry-content">
				
				<?php get_template_part( THEME_TEMPLATE . $format); ?>
					
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


<?php endwhile; ?>

	<?php echo theme_pagination();?>

<?php else : ?>

	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h1>Not Found</h1>
	</div>
<?php get_search_form(); ?>
<?php endif; ?>