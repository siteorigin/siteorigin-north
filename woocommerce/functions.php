<?php

function northern_woocommerce_change_hooks(){
	// Move the price higher
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 4 );

	// Move the
	remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
	add_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 35);
}
add_action('after_setup_theme', 'northern_woocommerce_change_hooks');

function northern_woocommerce_add_to_cart_text( $text ) {
	$text = '<span class="north-icon-cart"></span>' . $text;
	return $text;
}
add_filter('woocommerce_product_single_add_to_cart_text', 'northern_woocommerce_add_to_cart_text');

function northern_woocommerce_enqueue_styles( $styles ){
	$styles['northern-woocommerce'] = array(
		'src' => get_template_directory_uri() . '/woocommerce.css',
		'deps' => 'woocommerce-layout',
		'version' => SITEORIGIN_THEME_VERSION,
		'media' => 'all'
	);

	return $styles;
}
add_filter('woocommerce_enqueue_styles', 'northern_woocommerce_enqueue_styles');

function northern_woocommerce_enqueue_scripts( ){
	if( !function_exists('is_woocommerce') ) return;

	if( 'is_woocommerce' ) {
		wp_enqueue_script( 'northern-woocommerce', get_template_directory_uri() . '/js/woocommerce.js', array( 'jquery', 'northern-script' ), SITEORIGIN_THEME_VERSION );
	}
}
add_filter('wp_enqueue_scripts', 'northern_woocommerce_enqueue_scripts');

function northern_loop_shop_columns(){
	return 3;
}
add_filter('loop_shop_columns', 'northern_loop_shop_columns');