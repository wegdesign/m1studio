<?php

//Includes the header.php template file from your current theme's directory
get_header();
?>


<div id="primary" class="pagemid">
		<div class="inner">
			<div class="content-area">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div <?php post_class('searchresults'); ?> id="post-<?php the_ID(); ?>">

				<h2 class="entry-title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h2>

				<?php the_excerpt(); ?>

				<a href="<?php the_permalink() ?>" class="more-link"><?php echo theme_localize($atp_readmoretxt, '', ''); ?></a></div>
<!-- #post-<?php the_ID();?> -->

<?php endwhile; ?>

<?php echo theme_pagination(); ?>

<?php else : ?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<h1>Not Found</h1>
</div>
<?php get_search_form(); ?>
<?php endif; ?>

</div><!-- .entry-content -->

</div><!-- .inner -->
</div><!-- #primary.pagemid -->

<?php get_footer(); ?>