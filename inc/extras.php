<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 */
if ( ! function_exists( 'siteorigin_north_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
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

		$page_settings = siteorigin_page_setting();

		if ( ! empty( $page_settings ) ) {
			if ( ! empty( $page_settings['layout'] ) ) {
				$classes[] = 'page-layout-' . $page_settings['layout'];
			}

			if ( ! empty( $page_settings['menu'] ) ) {
				$classes[] = 'page-layout-menu-' . $page_settings['menu'];
			}

			if ( empty( $page_settings['masthead_margin'] ) ) {
				$classes[] = 'page-layout-no-masthead-margin';
			}

			if ( empty( $page_settings['footer_margin'] ) ) {
				$classes[] = 'page-layout-no-footer-margin';
			}

			if ( ! empty( $page_settings['hide_masthead'] ) ) {
				$classes[] = 'page-layout-hide-masthead';
			}

			if ( ! empty( $page_settings['hide_footer_widgets'] ) ) {
				$classes[] = 'page-layout-hide-footer-widgets';
			}
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

			if ( is_woocommerce() || is_cart() || is_checkout() ) {
				if ( is_active_sidebar( 'sidebar-shop' ) ) {
					$classes[] = 'active-wc-sidebar';
				} else {
					$classes[] = 'no-active-wc-sidebar';
				}
			}

			if ( siteorigin_setting( 'woocommerce_sidebar_position' ) == 'none' && ( is_woocommerce() || is_cart() || is_checkout() ) ) {
				$classes[] = 'wc-sidebar-none';
			}

			if ( siteorigin_setting( 'woocommerce_equalize_rows' ) ) {
				$classes[] = 'equalize-rows';
			}

			if ( wc_post_content_has_shortcode( 'products' ) ) {
				$classes[] = 'woocommerce';
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
}
add_filter( 'body_class', 'siteorigin_north_body_classes' );

/*
 * Allow the use of HTML in author bio
 */
remove_filter( 'pre_user_description', 'wp_filter_kses' );

if ( ! function_exists( 'siteorigin_north_tag_cloud_widget' ) ) {
	/*
	 * Have a uniform size for the tag cloud items
	 */
	function siteorigin_north_tag_cloud_widget( $args ) {
		$args['largest'] = 0.8;  // Largest tag.
		$args['smallest'] = 0.8; // Smallest tag.
		$args['unit'] = 'em';    // Tag font unit.

		return $args;
	}
}
add_filter( 'widget_tag_cloud_args', 'siteorigin_north_tag_cloud_widget' );

if ( ! function_exists( 'siteorigin_north_excerpt_length' ) ) {
	/*
	 * Filter the except length
	 */
	function siteorigin_north_excerpt_length( $length ) {
		return siteorigin_setting( 'blog_excerpt_length' );
	}
}
add_filter( 'excerpt_length', 'siteorigin_north_excerpt_length', 999 );
