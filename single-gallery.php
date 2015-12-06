<?php

//Includes the header.php template file from your current theme's directory
get_header();
?>

<div id="primary" class="pagemid">
		<div class="inner">
			<div class="content-area">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div <?php post_class( 'custompost-single' );?> id="post-<?php the_ID(); ?>">
					<div class="custompost_entry">
							<div class="custompost_details">
	
								<div class="custompost_thumb">
									<?php
										$images = miu_get_images($post_id=null);
										foreach ($images as $image):
    								?>
    								<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
									<?php endforeach; ?>		
								</div>
							</div>
					</div>
				<?php
				$images = miu_get_images($post_id=null);
					foreach ($images as $image):
    			?>
    			<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
				<?php endforeach; ?>

			</div><!-- #post-<?php the_ID(); ?> -->
			<div class="clear"></div>

			<?php endwhile; ?>

			</div><!-- .content-area -->

		</div><!-- .inner -->
</div><!-- #primary.pagemid -->

<?php get_footer(); ?>