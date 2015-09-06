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

		// For the settings metabox
		'meta_box' => __('Page settings', 'siteorigin-north'),
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
	$defaults['branding_site_description'] = true;
	$defaults['footer_text'] = __('Copyright © {year} {sitename}', 'siteorigin-north');
	$defaults['responsive_fitvids'] = true;
	return $defaults;
}
add_filter('siteorigin_settings_defaults', 'siteorigin_north_settings_defaults');

function siteorigin_north_custom_css( $css ) {
	$css .= '';
	return $css;
}
add_filter('siteorigin_settings_custom_css', 'siteorigin_north_custom_css');

/**
 * Setup Page Settings for SiteOrigin Northd
 */
function siteorigin_north_setup_page_settings(){

	SiteOrigin_Settings_Page_Settings::single()->configure( array(
		'layout' => array(
			'type' => 'select',
			'label' => __( 'Page Layout', 'siteorigin-north' ),
			'options' => array(
				'default' => __( 'Default', 'siteorigin-north' ),
				'no-sidebar' => __( 'No Sidebar', 'siteorigin-north' ),
				'full-width' => __( 'Full Width', 'siteorigin-north' ),
			),
			'default' => 'no-sidebar'
		),
		'menu' => array(
			'type' => 'select',
			'label' => __( 'Menu Position', 'siteorigin-north' ),
			'options' => array(
				'default' => __( 'Default', 'siteorigin-north' ),
				'overlap' => __( 'Overlaps Content', 'siteorigin-north' ),
			),
			'default' => 'no-sidebar'
		),
		'page_title' => array(
			'type' => 'checkbox',
			'label' => __( 'Page Title', 'siteorigin-north' ),
			'checkbox_label' => __( 'display', 'siteorigin-north' ),
			'default' => true,
			'description' => __('Display the page title on this page.', 'siteorigin-north')
		),
	) );

}
add_action('admin_init', 'siteorigin_north_setup_page_settings');