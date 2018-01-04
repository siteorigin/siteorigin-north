<?php
/**
 * The sidebar for WooCommerce shop pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package siteorigin-north
 * @license GPL 2.0
 */

if ( siteorigin_setting( 'woocommerce_sidebar_position' ) == 'none' ) return;
if ( ! in_array( siteorigin_page_setting( 'layout', 'default' ), array( 'default', 'full-width-sidebar' ), true )  ) return;
?>

<div id="secondary" class="widget-area" aria-label="<?php esc_attr_e( 'Shop Sidebar', 'siteorigin-north' ); ?>">
	<?php if ( is_active_sidebar( 'sidebar-shop' ) ) {
		dynamic_sidebar( 'sidebar-shop' );
	} else {
		dynamic_sidebar( 'main-sidebar' );
	} ?>
</div><!-- #secondary -->
