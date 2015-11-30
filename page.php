<?php

//Includes the header.php template file from your current theme's directory
get_header();
?>

<div id="primary" class="pagemid">
		<div class="inner">
			<div class="content-area">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'm1studio'), 'after' => '</div>')); ?>

</div><!-- #post-<?php the_ID(); ?> -->
<div class="clear"></div>

<?php endwhile; ?>

</div><!-- .content-area -->

</div><!-- .inner -->
</div><!-- #primary.pagemid -->

<?php get_footer(); ?>