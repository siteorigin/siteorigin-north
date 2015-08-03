<?php

/**
 * Initialize the settings
 */
function burst_settings_init(){
	// The branding section
	siteorigin_settings_add_section( 'branding', __('Branding', 'aviator') );

	siteorigin_settings_add_field('branding', 'logo', 'media', __('Logo', 'aviator'), array(
		'description' => __('Logo displayed in your masthead.', 'aviator')
	) );

	siteorigin_settings_add_field('branding', 'primary_color', 'color', __('Primary Color', 'aviator'), array(
		'description' => __('The Main color of your site.', 'aviator')
	) );
//
//	siteorigin_settings_add_field('branding', 'secondary_color', 'color', __('Secondary Color', 'aviator'), array(
//		'live' => true,
//		'description' => __('The secondary color of your site.', 'aviator')
//	) );

	siteorigin_settings_add_field('branding', 'font', 'font', __('Masthead Font', 'aviator'), array(
		'live' => true,
		'description' => __('The primary font of your site.', 'aviator')
	) );

	siteorigin_settings_add_field('branding', 'font_2', 'font', __('Body Font', 'aviator'), array(
		'live' => true,
		'description' => __('The primary font of your site.', 'aviator')
	) );

//	siteorigin_settings_add_teaser('branding', 'some_teaser', __('Some Teaser', 'burst'), array(
//		'description' => 'This is a description for the teaser.'
//	));

	// Navigation section

	siteorigin_settings_add_section( 'navigation', __('Navigation', 'aviator') );

	siteorigin_settings_add_field('navigation', 'sticky_menu', 'checkbox', __('Sticky Menu', 'aviator'), array(
		'description' => __('Sticks the menu to the top of the screen when a user scrolls down.', 'aviator')
	) );
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