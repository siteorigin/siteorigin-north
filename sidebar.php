<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package siteorigin-north
 */

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'main-sidebar' ); ?>
</div><!-- #secondary -->
