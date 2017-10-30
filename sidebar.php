<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package siteorigin-north
 * @license GPL 2.0 
 */

if ( ! is_active_sidebar( 'main-sidebar' ) ) return;
if ( ! in_array( siteorigin_page_setting( 'layout', 'default' ), array( 'default', 'full-width-sidebar' ), true )  ) return;
?>

<div id="secondary" class="widget-area" aria-label="<?php esc_attr_e( 'Main Sidebar', 'siteorigin-north' ); ?>">
	<?php dynamic_sidebar( 'main-sidebar' ); ?>
</div><!-- #secondary -->
