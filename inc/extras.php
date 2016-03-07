<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package siteorigin-north
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function siteorigin_north_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	$classes[] = 'no-js';
	$classes[] = 'css3-animations';
	if ( siteorigin_setting( 'responsive_disabled' ) == false ) {
		$classes[] = 'responsive';
	}

	if( is_page() ) {
		$classes[] = 'page-layout-' . SiteOrigin_Settings_Page_Settings::get('layout');
		$classes[] = 'page-layout-menu-' . SiteOrigin_Settings_Page_Settings::get('menu');
		if( !SiteOrigin_Settings_Page_Settings::get('masthead_margin') ) {
			$classes[] = 'page-layout-no-masthead-margin';
		}
		if( !SiteOrigin_Settings_Page_Settings::get('footer_margin') ) {
			$classes[] = 'page-layout-no-footer-margin';
		}
	}

	if( !is_active_sidebar('main-sidebar') ) {
		$classes[] = 'no-active-sidebar';
	}

	if( siteorigin_setting('navigation_sticky') ) {
		$classes[] = 'sticky-menu';
	}

	if( wp_is_mobile() ) {
		$classes[] = 'is_mobile';
	}

	return $classes;
}
add_filter( 'body_class', 'siteorigin_north_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function siteorigin_north_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'siteorigin-north' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'siteorigin_north_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function siteorigin_north_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'siteorigin_north_render_title' );
endif;

/* Have a uniform size for the tag cloud */
function siteorigin_north_tag_cloud_widget($args) {
	$args['largest'] = 0.8;  //largest tag
	$args['smallest'] = 0.8; //smallest tag
	$args['unit'] = 'em';    //tag font unit
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'siteorigin_north_tag_cloud_widget' );
