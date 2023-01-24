<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @license GPL 2.0
 */
$footer_class = '';
if ( ! siteorigin_setting( 'footer_constrained' ) ) {
	$footer_class .= ' unconstrained-footer';
}

if ( is_active_sidebar( 'footer-sidebar' ) ) {
	$footer_class .= ' footer-active-sidebar';
}
?>

		</div><!-- .container -->
	</div><!-- #content -->

	<?php do_action( 'siteorigin_north_footer_before' ); ?>

	<footer id="colophon" class="site-footer<?php echo $footer_class; ?>">

		<?php do_action( 'siteorigin_north_footer_top' ); ?>

		<?php
		if (
			! siteorigin_page_setting( 'hide_footer_widgets', false ) &&
			! in_array( siteorigin_page_setting( 'layout' ), array( 'stripped' ), true )
		) {
			?>
			<div class="container">

				<?php
				if ( is_active_sidebar( 'footer-sidebar' ) ) {
					$siteorigin_north_sidebars = wp_get_sidebars_widgets();
					?>
					<div class="widgets widget-area widgets-<?php echo count( $siteorigin_north_sidebars['footer-sidebar'] ); ?>" aria-label="<?php esc_attr_e( 'Footer Sidebar', 'siteorigin-north' ); ?>">
						<?php dynamic_sidebar( 'footer-sidebar' ); ?>
					</div>
					<?php
				}
				?>

			</div><!-- .container -->
		<?php } ?>

		<div class="site-info">
			<div class="container">
					<?php
				siteorigin_north_footer_text();

				if ( function_exists( 'the_privacy_policy_link' ) && siteorigin_setting( 'footer_privacy_policy_link' ) ) {
					the_privacy_policy_link( '<span>', '</span>' );
				}

				$credit_text = apply_filters(
					'siteorigin_north_footer_credits',
					'<span>' .
						sprintf(
							esc_html__( 'Theme by %s', 'siteorigin-north' ),
							'<a href="https://siteorigin.com/">SiteOrigin</a>'
						)
					. '</span>'
				);

				if ( ! empty( $credit_text ) ) {
					echo wp_kses_post( $credit_text );
				}
				?>
			</div>
		</div><!-- .site-info -->

		<?php do_action( 'siteorigin_north_footer_bottom' ); ?>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if ( siteorigin_setting( 'navigation_scroll_to_top' ) && siteorigin_page_setting( 'layout' ) !== 'stripped' ) { ?>
	<div id="scroll-to-top">
		<span class="screen-reader-text"><?php esc_html_e( 'Scroll to top', 'siteorigin-north' ); ?></span>
		<?php siteorigin_north_display_icon( 'up-arrow' ); ?>
	</div>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>
