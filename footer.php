<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package burst
 */

?>
		</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php
		if( is_active_sidebar( 'footer-sidebar' ) ) {
			$the_sidebars = wp_get_sidebars_widgets();

			?>
			<div class="widgets widgets-<?php echo count( $the_sidebars['footer-sidebar'] ) ?>">
				<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			</div>
			<?php
		}
		?>

		<div class="site-info">
			This is some temp text
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'burst' ), 'Burst', '<a href="https://siteorigin.com/" rel="designer">SiteOrigin</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
