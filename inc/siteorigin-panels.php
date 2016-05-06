<?php

if ( ! function_exists( 'siteorigin_north_panels_lite_localization' ) ) :
/**
 * The default panels lite labels.
 */
function siteorigin_north_panels_lite_localization( $loc ) {
	return wp_parse_args( array(
		'page_builder'         => __( 'Page Builder', 'siteorigin-north' ),
		'home_page_title'      => __( 'Custom Home Page Builder', 'siteorigin-north' ),
		'home_page_menu'       => __( 'Home Page', 'siteorigin-north' ),
		'install_plugin'       => __( 'Install Page Builder Plugin', 'siteorigin-north' ),
		'on_text'              => __( 'On', 'siteorigin-north' ),
		'off_text'             => __( 'Off', 'siteorigin-north' ),
		'home_install_message' => __( 'SiteOrigin North supports Page Builder to create beautifully proportioned column based content.', 'siteorigin-north' ),
		// Longer message to display to a user about installing the plugin
		'home_disable_message' => '',
		// Message about disabling the custom home page if the user doesn't want to use it
	), $loc );
}
endif;
add_filter( 'siteorigin_panels_lite_localization', 'siteorigin_north_panels_lite_localization' );
