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

	SiteOrigin_Settings::single()->configure( apply_filters( 'siteorigin_north_settings_array', array(

		'branding' => array(
			'title' => __('Branding', 'siteorigin-north'),
			'fields' => array(
				'logo' => array(
					'type' => 'media',
					'label' => __('Logo', 'siteorigin-north'),
					'description' => __('Logo displayed in your masthead.', 'siteorigin-north')
				),
				'site_description' => array(
					'type' => 'checkbox',
					'label' => __('Site Description', 'siteorigin-north'),
					'description' => __('Show your site description below your site title or logo.', 'siteorigin-north')
				)
			)
		),

		'masthead' => array(
			'title' => __('Header', 'siteorigin-north'),
			'fields' => array(
				'layout' => array(
					'type' => 'select',
					'label' => __('Header layout', 'siteorigin-north'),
					'options' => array(
						'default' => __('Default', 'siteorigin-north'),
						'centered' => __('Centered', 'siteorigin-north'),
					)
				),
				'text_above' => array(
					'type' => 'text',
					'label' => __('Text Above', 'siteorigin-north'),
					'description' => __('Text that goes above the main header.', 'siteorigin-north'),
				)
			)
		),

		'navigation' => array(
			'title' => __( 'Navigation', 'siteorigin-widgets' ),
			'fields' => array(
				'search' => array(
					'type' => 'checkbox',
					'label' => __('Menu search', 'siteorigin-north'),
					'description' => __('Display search in main menu', 'siteorigin-north'),
				),
				'sticky' => array(
					'type' => 'checkbox',
					'label' => __('Sticky menu', 'siteorigin-north'),
					'description' => __('Stick menu to top of screen', 'siteorigin-north'),
				),
				'sticky_scale' => array(
					'type' => 'checkbox',
					'label' => __('Sticky menu scales logo', 'siteorigin-north'),
					'description' => __('Should the main logo be downscaled when scrolling', 'siteorigin-north'),
				),
				'resize_logo' => array(
					'type' => 'checkbox',
					'label' => __('Resize logo', 'siteorigin-north'),
					'description' => __('Resize logo in sticky', 'siteorigin-north'),
				),
				'post' => array(
					'type' => 'checkbox',
					'label' => __('Post navigation', 'siteorigin-north'),
					'description' => __('Display next and previous post navigation', 'siteorigin-north'),
				),
				'scroll_to_top' => array(
					'type' => 'checkbox',
					'label' => __('Scroll to top', 'siteorigin-north'),
					'description' => __('Display a scroll to top button', 'siteorigin-north'),
				),
			),
		),

		'blog' => array(
			'title' => __( 'Blog', 'siteorigin-widgets' ),
			'fields' => array(
				'featured_archive' => array(
					'type' => 'checkbox',
					'label' => __('Featured image on archive', 'siteorigin-north'),
				),
				'featured_single' => array(
					'type' => 'checkbox',
					'label' => __('Featured image on single', 'siteorigin-north'),
				),
				'display_date' => array(
					'type' => 'checkbox',
					'label' => __('Display date', 'siteorigin-north'),
				),
				'display_author' => array(
					'type' => 'checkbox',
					'label' => __('Display author', 'siteorigin-north'),
				),
				'display_comment_count' => array(
					'type' => 'checkbox',
					'label' => __('Display comment count', 'siteorigin-north'),
				),
			),
		),

		'responsive' => array(
			'title' => __('Responsive', 'siteorigin-north'),
			'fields' => array(
				'menu_text' => array(
					'type' => 'text',
					'label' => __('Responsive Menu Text', 'siteorigin-north'),
				),

				'fitvids' => array(
					'type' => 'checkbox',
					'label' => __('Use Fitvids', 'siteorigin-north'),
				),
			)
		),

		'footer' => array(
			'title' => __('Footer', 'siteorigin-north'),
			'fields' => array(
				'text' => array(
					'type' => 'text',
					'label' => __('Footer Text', 'siteorigin-north'),
					'description' => __("{sitename} and {year} are your site's name and current year", 'siteorigin-north'),
					'sanitize_callback' => 'wp_kses_post',
				),
				'constrained' => array(
					'type' => 'checkbox',
					'label' => __('Constrain', 'siteorigin-north'),
					'description' => __("Constrain the footer width", 'siteorigin-north'),
				)
			)
		),
	) ) );

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

	$defaults['masthead_text_layout'] = 'default';
	$defaults['masthead_text_above'] = '';

	$defaults['navigation_search'] = true;
	$defaults['navigation_sticky'] = true;
	$defaults['navigation_sticky_scale'] = true;
	$defaults['navigation_resize_logo'] = true;
	$defaults['navigation_post'] = true;
	$defaults['navigation_scroll_to_top'] = true;

	$defaults['responsive_fitvids'] = true;
	$defaults['responsive_menu_text'] = __('Menu', 'siteorigin-widgets');

	$defaults['blog_featured_archive'] = true;
	$defaults['blog_featured_single'] = true;
	$defaults['blog_display_date'] = true;
	$defaults['blog_display_author'] = true;
	$defaults['blog_display_comment_count'] = true;

	$defaults['footer_text'] = __('Copyright © {year} {sitename}', 'siteorigin-north');
	$defaults['footer_constrained'] = false;
	return $defaults;
}
add_filter('siteorigin_settings_defaults', 'siteorigin_north_settings_defaults');

function siteorigin_north_custom_css( $css ) {
	$css .= '';
	return $css;
}
add_filter('siteorigin_settings_custom_css', 'siteorigin_north_custom_css');

/**
 * Setup Page Settings for SiteOrigin North
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
		),

		'menu' => array(
			'type' => 'select',
			'label' => __( 'Menu Position', 'siteorigin-north' ),
			'options' => array(
				'default' => __( 'Default', 'siteorigin-north' ),
				'overlap' => __( 'Overlaps Content', 'siteorigin-north' ),
			),
		),

		'page_title' => array(
			'type' => 'checkbox',
			'label' => __( 'Page Title', 'siteorigin-north' ),
			'checkbox_label' => __( 'display', 'siteorigin-north' ),
			'description' => __('Display the page title on this page.', 'siteorigin-north')
		),

		'masthead_margin' => array(
			'type' => 'checkbox',
			'label' => __( 'Masthead Bottom Margin', 'siteorigin-north' ),
			'checkbox_label' => __( 'enable', 'siteorigin-north' ),
			'default' => true,
			'description' => __('Include the margin below the masthead (top area) of your site.', 'siteorigin-north')
		),

		'footer_margin' => array(
			'type' => 'checkbox',
			'label' => __( 'Footer Top Margin', 'siteorigin-north' ),
			'checkbox_label' => __( 'enable', 'siteorigin-north' ),
			'default' => true,
			'description' => __('Include the margin above your footer.', 'siteorigin-north')
		),
	) );

}
add_action('siteorigin_page_settings_init', 'siteorigin_north_setup_page_settings');

/**
 * Add the default Page Settings
 */
function siteorigin_north_setup_page_setting_defaults( $defaults ){
	$defaults['layout'] = 'no-sidebar';
	$defaults['menu'] = 'default';
	$defaults['page_title'] = true;
	$defaults['masthead_margin'] = true;
	$defaults['footer_margin'] = true;
	return $defaults;
}
add_filter('siteorigin_page_settings_defaults', 'siteorigin_north_setup_page_setting_defaults');