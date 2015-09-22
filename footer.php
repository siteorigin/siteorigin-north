<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package siteorigin-north
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
			<?php siteorigin_north_footer_text() ?>
			<span class="sep"> | </span>
			<?php
			echo wp_kses_post(
				apply_filters(
					'siteorigin_north_footer_credits',
					sprintf( esc_html__( 'Theme by %s.', 'siteorigin-north' ), '<a href="https://siteorigin.com/" rel="designer">SiteOrigin</a>' )
				)
			);
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if( siteorigin_setting('navigation_scroll_to_top') ) : ?>
	<div id="scroll-to-top">
		<img src="<?php echo get_template_directory_uri() ?>/images/up-arrow.svg" width="24px" height="24px" />
	</div>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
