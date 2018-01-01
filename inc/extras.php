<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package siteorigin-north
 */

if ( ! function_exists( 'siteorigin_north_body_classes' ) ) :
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
	$classes[] = 'no-touch';
	if ( siteorigin_setting( 'responsive_disabled' ) == false ) {
		$classes[] = 'responsive';
	}

	$page_settings = siteorigin_page_setting();

	if ( ! empty( $page_settings ) ) {
		if ( ! empty( $page_settings['layout'] ) ) $classes[] = 'page-layout-' . $page_settings['layout'];
		if ( ! empty( $page_settings['menu'] ) ) $classes[] = 'page-layout-menu-' . $page_settings['menu'];

		if ( empty( $page_settings['masthead_margin'] ) ) $classes[] = 'page-layout-no-masthead-margin';
		if ( empty( $page_settings['footer_margin'] ) ) $classes[] = 'page-layout-no-footer-margin';
		if ( ! empty( $page_settings['hide_masthead'] ) ) $classes[] = 'page-layout-hide-masthead';
		if ( ! empty( $page_settings['hide_footer_widgets'] ) ) $classes[] = 'page-layout-hide-footer-widgets';
	}

	if ( wp_is_mobile() ) {
		$classes[] = 'is-mobile-device';
	}

	if ( ! is_active_sidebar( 'main-sidebar' ) ) {
		$classes[] = 'no-active-sidebar';
	}

	if ( siteorigin_setting( 'structure_sidebar_position' ) == 'left' ) {
		$classes[] = 'layout-sidebar-left';
	}

	if ( siteorigin_setting( 'navigation_sticky' ) ) {
		$classes[] = 'sticky-menu';
	}

	if ( class_exists( 'Woocommerce' ) ) {

		if ( ! siteorigin_setting( 'masthead_text_above' ) && ! is_active_sidebar( 'topbar-sidebar' ) && ! is_store_notice_showing() ) {
			$classes[] = 'no-topbar';
		}	

		if ( siteorigin_setting( 'woocommerce_sidebar_position' ) == 'left' && ( is_woocommerce() || is_cart() || is_checkout() ) ) {
			$classes[] = 'layout-wc-sidebar-left';
		}

		if ( ! is_active_sidebar( 'sidebar-shop' ) && is_woocommerce() || is_cart() || is_checkout() ) {
			$classes[] = 'no-active-wc-sidebar';
		}		
		
		if ( siteorigin_setting( 'woocommerce_sidebar_position' ) == 'none' && ( is_woocommerce() || is_cart() || is_checkout() ) ) {
			$classes[] = 'wc-sidebar-none';
		}
		
		
	} elseif ( ! siteorigin_setting( 'masthead_text_above' ) && ! is_active_sidebar( 'topbar-sidebar' ) ) {
		$classes[] = 'no-topbar';
	}

	if ( siteorigin_setting( 'navigation_scroll_to_top_mobile' ) ) {
		$classes[] = 'mobile-scroll-to-top';
	}

	if ( siteorigin_setting( 'woocommerce_archive_columns' ) ) {
		$classes[] = 'wc-columns-' . siteorigin_setting( 'woocommerce_archive_columns' );
	}

	return $classes;
}
endif;
add_filter( 'body_class', 'siteorigin_north_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	if ( ! function_exists( 'siteorigin_north_wp_title' ) ) :
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
	endif;
	add_filter( 'wp_title', 'siteorigin_north_wp_title', 10, 2 );

	if ( ! function_exists( 'siteorigin_north_render_title' ) ) :
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
	endif;
	add_action( 'wp_head', 'siteorigin_north_render_title' );
endif;

/*
 * Allow the use of HTML in author bio
 */
remove_filter( 'pre_user_description' , 'wp_filter_kses' );

if ( ! function_exists( 'siteorigin_north_tag_cloud_widget' ) ) :
/*
 * Have a uniform size for the tag cloud items
 */
function siteorigin_north_tag_cloud_widget($args) {
	$args['largest'] = 0.8;  // Largest tag.
	$args['smallest'] = 0.8; // Smallest tag.
	$args['unit'] = 'em';    // Tag font unit.
	return $args;
}
endif;
add_filter( 'widget_tag_cloud_args', 'siteorigin_north_tag_cloud_widget' );

if ( ! function_exists( 'siteorigin_north_excerpt_length' ) ) :
/*
 * Filter the except length
 */
function siteorigin_north_excerpt_length( $length ) {
	return siteorigin_setting( 'blog_excerpt_length' );
}
endif;
add_filter( 'excerpt_length', 'siteorigin_north_excerpt_length', 999 );
