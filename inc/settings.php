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

//	siteorigin_settings_add_section( 'fonts', __('Fonts', 'burst') );
//
//	siteorigin_settings_add_field('fonts', 'heading', 'font', __('Masthead Font', 'burst'), array(
//		'live' => true,
//		'description' => __('The primary font of your site.', 'burst')
//	) );
//
//	siteorigin_settings_add_field('fonts', 'body', 'font', __('Body Font', 'burst'), array(
//		'live' => true,
//		'description' => __('The primary font of your site.', 'burst')
//	) );

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
	$defaults['branding_description'] = true;

	$defaults['branding_primary_color'] = '#99ffff';
	$defaults['branding_secondary_color'] = '#99ffff';

	$defaults['navigation_sticky_menu'] = true;

	return $defaults;
}
add_filter('siteorigin_settings_defaults', 'burst_settings_defaults');

function burst_custom_css( $css ) {
	$css .= '';
	return $css;
}
add_filter('siteorigin_settings_custom_css', 'burst_custom_css');