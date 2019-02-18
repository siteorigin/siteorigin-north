<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package siteorigin-north
 * @license GPL 2.0  
 */

if ( ! function_exists( 'siteorigin_north_jetpack_setup' ) ) :
/**
 * Jetpack setup function.
 *
 */
function siteorigin_north_jetpack_setup() {
	/*
	 * Enable support for Jetpack Infinite Scroll.
	 * See: https://jetpack.com/support/infinite-scroll/
	 */	
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'siteorigin_north_infinite_scroll_render',
		'footer'    => 'page',
		'posts_per_page' => 9,
	) );
} // end function siteorigin_north_jetpack_setup
endif;
add_action( 'after_setup_theme', 'siteorigin_north_jetpack_setup' );

if ( Jetpack::is_module_active( 'lazy-images' ) ) :
	if (  ! function_exists( 'siteorigin_north_jetpack_logo_not_lazy' ) ) {

		function siteorigin_north_jetpack_logo_not_lazy( $blacklisted_classes ) {
			$blacklisted_classes[] = 'custom-logo';

			return $blacklisted_classes;
		}
		add_filter( 'jetpack_lazy_images_blacklisted_classes', 'siteorigin_north_jetpack_logo_not_lazy' );
	}

	if ( ! function_exists( 'siteorigin_north_jetpack_logo_not_lazy_class' ) ) {

		function siteorigin_north_jetpack_logo_not_lazy_class( $attrs ) {
			if ( ! empty( $attrs['class'] ) ) {
				$attrs['class'] .= ' skip-lazy';
			} else {
				$attrs['class'] = 'skip-lazy';
			}

			return $attrs;
		}
		add_filter( 'siteorigin_north_logo_attributes', 'siteorigin_north_jetpack_logo_not_lazy_class' );
	}
endif;

if ( ! function_exists( 'siteorigin_north_infinite_scroll_render' ) ) :
/**
 * Custom render function for Infinite Scroll.
 */
function siteorigin_north_infinite_scroll_render() {
	if ( function_exists( 'is_woocommerce' ) && ( is_shop() || is_woocommerce() ) ) {
		echo '<ul class="products">';
		while ( have_posts() ) {
			the_post();
			wc_get_template_part( 'content', 'product' );
		}
		echo '</ul>';
	} else {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		}
	}
} // end function siteorigin_north_infinite_scroll_render
endif;
