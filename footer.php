</div> <!-- main -->
</div><!-- #Ajax wrap -->
<div id="footer">
	<div class="inner">
		<div class="footer-sidebar clearfix">
			<div class="one_fourth">
				<?php dynamic_sidebar('footercolumn1'); ?>
			</div>
			<div class="one_fourth">
				<?php dynamic_sidebar('footercolumn2'); ?>
			</div>
			<div class="one_fourth">
				<?php dynamic_sidebar('footercolumn3'); ?>
			</div>
			<div class="one_fourth last">
				<?php dynamic_sidebar('footercolumn4'); ?>
			</div>
		</div><!-- .footer-sidebar -->
		<div class="copyright clearfix">
			<div class="copyright_left">
				<?php if(theme_get_option( 'copyright_left' ) != ""){ echo theme_get_option( 'copyright_left' ); }?>
			</div>
			<!-- .copyright_left -->
			<div class="copyright_right">
				<?php if(theme_get_option( 'copyright_right' ) != ""){ echo theme_get_option( 'copyright_right' ); }?>
			</div>
			<!-- .copyright_left -->
		</div>
		<!-- .copyright -->

	</div><!-- .inner -->
</div><!-- #footer -->
</div> <!-- /#wrapper -->
</div> <!-- /#boxed -->
<?php wp_footer(); ?>

</body>
</html>
<!-- Fine Footer -->