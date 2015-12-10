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
		
		<?php 
		$count = 0;

	if (have_posts()) : 
	
	$message_service = theme_get_option('message_services');
	if($message_service != ""){
	?>
	
	<h2><?php echo $message_service;?></h2>
	
	<?php
		}
		while (have_posts()) : the_post(); ?>
	
	
	<?php if($count == 0 ) {
				echo '<div style="padding:40px 0 ;"> ';
			} ?>
	
	<?php $format = get_post_format($post -> ID); ?>
	
	<?php
		if (false === $format) { $format = 'standard'; }
 ?>

	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			
			<?php 
			$type_column = "one_third";
			if($count == 2){
				$type_column = "one_third_last";
			}
			$sp1 = get_post($post -> ID);
			$sp1_title = $sp1->post_title;
			$sp1_content = $sp1->post_content;
			$sp1_icon = get_post_meta( $sp1->ID, 'fa_field_icon', true );
			echo do_shortcode('[' . $type_column . '][servicesicon align="left" icon="' . $sp1_icon . '" title="' . $sp1_title . '"]' . $sp1_content . '[/servicesicon] [/' . $type_column . ']');  ?>
			
	</div>
			<?php if($count == 3 ) {
				echo '</div>';
				$count = 0;
			} 
			$count++;
			?>

<?php endwhile; ?>

	<?php echo theme_pagination(); ?>

<?php else : ?>

	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h1>Not Found</h1>
	</div>
<?php get_search_form(); ?>
<?php endif; ?>
		
		</div>
	</div><!-- inner -->
</div><!-- #primary.pagemid -->


<?php get_footer(); ?>