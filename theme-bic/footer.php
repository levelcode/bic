
<footer id="colophon" role="contentinfo">
	<div class="site-info">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			<div class="footer-sidebar" role="complementary">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div><!-- #secondary -->
		<?php endif; ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

  <?php wp_footer(); ?>

</body>
</html>