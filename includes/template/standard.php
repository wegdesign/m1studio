<?php 
	if( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
		global $post_id;
		$img_alt_title 	= get_the_title();
?>
		<div class="postimg">
			<a title="<?php get_the_title(); ?>" href="<?php the_permalink(); ?>">
				<?php echo theme_resize($post_id,'','670','300','imgborder', $img_alt_title );?>
			</a>
		</div>
<?php } ?>