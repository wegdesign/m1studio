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

			<div class="error_404">

				<h2>Ooops... Error 404</h2>
				<h5>We're sorry, but the page you are looking for doesn't exist.</h5>
				<p class="center">
					<a class="btn large m1studio" href="<?php echo home_url(); ?>"><span>Go To Homepage</span></a>
				</p>

			</div><!-- .error_404 -->
		</div><!-- .content-area -->

	</div><!-- inner -->
</div><!-- #primary.pagemid -->

<?php get_footer(); ?>