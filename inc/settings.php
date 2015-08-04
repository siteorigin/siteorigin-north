<?php

function siteorigin_settings_localize( $loc ){
	return array(
		'section_title' => __('Theme Settings', 'northern'),
		'section_description' => __('Change settings for your theme.', 'northern'),
		'premium_only' => __('Premium Only', 'northern'),
		'premium_url' => '#',

		// For the controls
		'variant' => __('Variant', 'northern'),
		'subset' => __('Subset', 'northern'),
	);
}
add_filter('siteorigin_settings_localization', 'siteorigin_settings_localize');

/**
 * Initialize the settings
 */
function northern_settings_init(){
	// The branding section
	siteorigin_settings_add_section( 'branding', __('Branding', 'northern') );

	siteorigin_settings_add_field('branding', 'logo', 'media', __('Logo', 'northern'), array(
		'description' => __('Logo displayed in your masthead.', 'northern')
	) );

	siteorigin_settings_add_teaser( 'branding', 'logo_retina', 'media', __('Retina Logo', 'northern'), array(
		'description' => __('High resolution version of the logo.', 'northern')
	) );

	siteorigin_settings_add_field( 'branding', 'site_description', 'checkbox', __('Site Description', 'northern'), array(
		'description' => __('Show your site description below your site title or logo.', 'northern')
	) );

	siteorigin_settings_add_section( 'footer', __('Footer', 'northern') );

	siteorigin_settings_add_field( 'footer', 'text', 'text', __('Footer Text', 'northern'), array(
		'description' => __("{sitename} and {year} are your site's name and current year", 'northern'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	siteorigin_settings_add_section( 'responsive', __('Responsive', 'northern') );

	siteorigin_settings_add_field( 'responsive', 'fitvids', 'checkbox', __('Use Fitvids', 'northern') );

}
add_action('siteorigin_settings_init', 'northern_settings_init');

/**
 * Add default settings.
 *
 * @param $defaults
 *
 * @return mixed
 */
function northern_settings_defaults( $defaults ){
	$defaults['branding_logo'] = false;
	$defaults['branding_logo_retina'] = false;
	$defaults['branding_site_description'] = true;

	$defaults['footer_text'] = __('Copyright © {year} {sitename}');

	$defaults['responsive_fitvids'] = true;

	return $defaults;
}
add_filter('siteorigin_settings_defaults', 'northern_settings_defaults');

function northern_custom_css( $css ) {
	$css .= '';
	return $css;
}
add_filter('siteorigin_settings_custom_css', 'northern_custom_css');