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

<div id="secondary" class="widget-area" role="complementary" aria-label="<?php _e( 'Main Sidebar', 'siteorigin-north' ); ?>">
	<?php dynamic_sidebar( 'main-sidebar' ); ?>
</div><!-- #secondary -->
