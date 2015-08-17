<?php

function siteorigin_settings_localize( $loc ){
	return array(
		'section_title' => __('Theme Settings', 'siteorigin-north'),
		'section_description' => __('Change settings for your theme.', 'siteorigin-north'),
		'premium_only' => __('Premium Only', 'siteorigin-north'),
		'premium_url' => '#',

		// For the controls
		'variant' => __('Variant', 'siteorigin-north'),
		'subset' => __('Subset', 'siteorigin-north'),
	);
}
add_filter('siteorigin_settings_localization', 'siteorigin_settings_localize');

/**
 * Initialize the settings
 */
function siteorigin_north_settings_init(){
	// The branding section
	siteorigin_settings_add_section( 'branding', __('Branding', 'siteorigin-north') );

	siteorigin_settings_add_field('branding', 'logo', 'media', __('Logo', 'siteorigin-north'), array(
		'description' => __('Logo displayed in your masthead.', 'siteorigin-north')
	) );

	siteorigin_settings_add_teaser( 'branding', 'logo_retina', 'media', __('Retina Logo', 'siteorigin-north'), array(
		'description' => __('High resolution version of the logo.', 'siteorigin-north')
	) );

	siteorigin_settings_add_field( 'branding', 'site_description', 'checkbox', __('Site Description', 'siteorigin-north'), array(
		'description' => __('Show your site description below your site title or logo.', 'siteorigin-north')
	) );

	siteorigin_settings_add_section( 'footer', __('Footer', 'siteorigin-north') );

	siteorigin_settings_add_field( 'footer', 'text', 'text', __('Footer Text', 'siteorigin-north'), array(
		'description' => __("{sitename} and {year} are your site's name and current year", 'siteorigin-north'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	siteorigin_settings_add_section( 'responsive', __('Responsive', 'siteorigin-north') );

	siteorigin_settings_add_field( 'responsive', 'fitvids', 'checkbox', __('Use Fitvids', 'siteorigin-north') );

}
add_action('siteorigin_settings_init', 'siteorigin_north_settings_init');

/**
 * Add default settings.
 *
 * @param $defaults
 *
 * @return mixed
 */
function siteorigin_north_settings_defaults( $defaults ){
	$defaults['branding_logo'] = false;
	$defaults['branding_logo_retina'] = false;
	$defaults['branding_site_description'] = true;

	$defaults['footer_text'] = __('Copyright © {year} {sitename}');

	$defaults['responsive_fitvids'] = true;

	return $defaults;
}
add_filter('siteorigin_settings_defaults', 'siteorigin_north_settings_defaults');

function siteorigin_north_custom_css( $css ) {
	$css .= '';
	return $css;
}
add_filter('siteorigin_settings_custom_css', 'siteorigin_north_custom_css');