<?php

/**
 * Initialize the settings
 */
function burst_settings_init(){
	// The branding section
	siteorigin_settings_add_section( 'branding', __('Branding', 'burst') );

	siteorigin_settings_add_field('branding', 'logo', 'media', __('Logo', 'burst'), array(
		'description' => __('Logo displayed in your masthead.', 'burst')
	) );

	siteorigin_settings_add_teaser( 'branding', 'logo_retina', 'media', __('Retina Logo', 'burst'), array(
		'description' => __('High resolution version of the logo.', 'burst')
	) );

	siteorigin_settings_add_field( 'branding', 'site_description', 'checkbox', __('Site Description', 'burst'), array(
		'description' => __('Show your site description below your site title or logo.', 'burst')
	) );

	siteorigin_settings_add_section( 'footer', __('Footer', 'burst') );

	siteorigin_settings_add_field( 'footer', 'text', 'text', __('Footer Text', 'burst'), array(
		'description' => __("{sitename} and {year} are your site's name and current year", 'burst'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	siteorigin_settings_add_section( 'responsive', __('Responsive', 'burst') );

	siteorigin_settings_add_field( 'responsive', 'fitvids', 'checkbox', __('Use Fitvids', 'burst') );

}
add_action('siteorigin_settings_init', 'burst_settings_init');

/**
 * Add default settings.
 *
 * @param $defaults
 *
 * @return mixed
 */
function burst_settings_defaults( $defaults ){
	$defaults['branding_logo'] = false;
	$defaults['branding_logo_retina'] = false;
	$defaults['branding_site_description'] = true;

	$defaults['footer_text'] = __('Copyright © {year} {sitename}');

	$defaults['responsive_fitvids'] = true;

	return $defaults;
}
add_filter('siteorigin_settings_defaults', 'burst_settings_defaults');

function burst_custom_css( $css ) {
	$css .= '';
	return $css;
}
add_filter('siteorigin_settings_custom_css', 'burst_custom_css');