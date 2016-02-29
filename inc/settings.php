<?php

function siteorigin_north_settings_localize( $loc ){
	return wp_parse_args( array(
		'section_title' => __('Theme Settings', 'siteorigin-north'),
		'section_description' => __('Change settings for your theme.', 'siteorigin-north'),
		'premium_only' => __('Available in Premium', 'siteorigin-north'),
		'premium_url' => 'https://siteorigin.com/premium/?target=theme_north',

		// For the controls
		'variant' => __('Variant', 'siteorigin-north'),
		'subset' => __('Subset', 'siteorigin-north'),

		// For the settings metabox
		'meta_box' => __('Page settings', 'siteorigin-north'),
	), $loc);
}
add_filter('siteorigin_settings_localization', 'siteorigin_north_settings_localize');

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
				'retina_logo' => array(
					'type' => 'media',
					'label' => __('Retina Logo', 'siteorigin-north'),
					'description' => __('A double sized logo to use on retina devices.', 'siteorigin-north')
				),
				'site_description' => array(
					'type' => 'checkbox',
					'label' => __('Site Description', 'siteorigin-north'),
					'description' => __('Show your site description below your site title or logo.', 'siteorigin-north')
				),
//				'attribution' => array(
//					'type' => 'checkbox',
//					'label' => __('SiteOrigin Attribution', 'siteorigin-north'),
//					'description' => __('Remove SiteOrigin attribution from your footer.', 'siteorigin-north'),
//					'teaser' => true,
//				),
				'accent' => array(
					'type' => 'color',
					'label' => __('Accent Color', 'siteorigin-north'),
					'description' => __('The color used for links and various other accents.', 'siteorigin-north'),
					'live' => true,
				),
				'accent_dark' => array(
					'type' => 'color',
					'label' => __('Dark Accent Color', 'siteorigin-north'),
					'description' => __('A darker version of your accent color.', 'siteorigin-north'),
					'live' => true,
				),
			)
		),

		'fonts' => array(
			'title' => __('Fonts', 'siteorigin-north'),
			'fields' => array(

				// The font families used

				'main' => array(
					'type' => 'font',
					'label' => __('Main Font', 'siteorigin-north'),
					'description' => __('Main font used on your site.', 'siteorigin-north'),
					'live' => true,
				),

				'headings' => array(
					'type' => 'font',
					'label' => __('Headings font', 'siteorigin-north'),
					'description' => __('Font used for headings.', 'siteorigin-north'),
					'live' => true,
				),

				'details' => array(
					'type' => 'font',
					'label' => __('Details font', 'siteorigin-north'),
					'description' => __('Font used for smaller details.', 'siteorigin-north'),
					'live' => true,
				),

				// The colors

				'text_dark' => array(
					'type' => 'color',
					'label' => __('Dark Text Color', 'siteorigin-north'),
					'live' => true,
				),

				'text_medium' => array(
					'type' => 'color',
					'label' => __('Medium Text Color', 'siteorigin-north'),
					'live' => true,
				),

				'text_light' => array(
					'type' => 'color',
					'label' => __('Light Text Color', 'siteorigin-north'),
					'live' => true,
				),

				'text_meta' => array(
					'type' => 'color',
					'label' => __('Meta Text Color', 'siteorigin-north'),
					'live' => true,
				),

			),
		),

		'structure' => array(
			'title' => __('Page Structure', 'siteorigin-north'),
			'fields' => array(
				'sidebar_width' => array(
					'label' => __('Sidebar Width', 'siteorigin-north'),
					'type' => 'text',
					'sanitize_callback' => array('SiteOrigin_Settings_Value_Sanitize', 'measurement'),
					'live' => true,
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
				),

				'background_color' => array(
					'type' => 'color',
					'label' => __('Background Color', 'siteorigin-north'),
					'live' => true,
				),

				'top_background_color' => array(
					'type' => 'color',
					'label' => __('Background Top Color', 'siteorigin-north'),
					'live' => true,
				),

				'border_color' => array(
					'type' => 'color',
					'label' => __('Border Color', 'siteorigin-north'),
					'live' => true,
				),

				'border_width' => array(
					'type' => 'text',
					'label' => __('Border Width', 'siteorigin-north'),
					'sanitize_callback' => array( 'SiteOrigin_Settings_Value_Sanitize', 'measurement' ),
					'live' => true,
				),

				'padding' => array(
					'type' => 'text',
					'label' => __('Padding', 'siteorigin-north'),
					'sanitize_callback' => array( 'SiteOrigin_Settings_Value_Sanitize', 'measurement' ),
					'live' => true,
				),

				'bottom_margin' => array(
					'type' => 'text',
					'label' => __('Bottom Margin', 'siteorigin-north'),
					'sanitize_callback' => array( 'SiteOrigin_Settings_Value_Sanitize', 'measurement' ),
					'live' => true,
				),
			)
		),

		'navigation' => array(
			'title' => __( 'Navigation', 'siteorigin-north' ),
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
				'smooth_scroll' => array(
					'type' => 'checkbox',
					'label' => __('Smooth scroll', 'siteorigin-north'),
					'description' => __('Smooth scroll for internal anchor links', 'siteorigin-north'),
				)
			),
		),

		'blog' => array(
			'title' => __( 'Blog', 'siteorigin-north' ),
			'fields' => array(
				'featured_archive' => array(
					'type' => 'checkbox',
					'label' => __('Featured image on archive', 'siteorigin-north'),
				),
				'featured_single' => array(
					'type' => 'checkbox',
					'label' => __('Featured image on single', 'siteorigin-north'),
				),
				'display_author_box' => array(
					'type' => 'checkbox',
					'label' => __('Display author box on single', 'siteorigin-north'),
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
				)
			)
		),

		'responsive' => array(
			'title' => __('Responsive', 'siteorigin-north'),
			'fields' => array(
				'disabled' => array(
					'type' => 'checkbox',
					'label' => __('Disable Responsive Layout', 'siteorigin-north'),
				),
				'menu_text' => array(
					'type' => 'text',
					'label' => __('Responsive Menu Text', 'siteorigin-north'),
				),
				'menu_breakpoint' => array(
					'label' => __('Menu Breakpoint', 'siteorigin-north'),
					'type' => 'text',
					'description' => __('Screen width in px.', 'siteorigin-north')
				),
				'fitvids' => array(
					'type' => 'checkbox',
					'label' => __('Use Fitvids', 'siteorigin-north'),
				)
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
				),

				'background_color' => array(
					'type' => 'color',
					'label' => __('Background Color', 'siteorigin-north'),
					'live' => true,
				),

				'border_color' => array(
					'type' => 'color',
					'label' => __('Border Color', 'siteorigin-north'),
					'live' => true,
				),

				'border_width' => array(
					'type' => 'text',
					'label' => __('Border Width', 'siteorigin-north'),
					'sanitize_callback' => array( 'SiteOrigin_Settings_Value_Sanitize', 'measurement' ),
					'live' => true,
				),

				'top_padding' => array(
					'type' => 'text',
					'label' => __('Top Padding', 'siteorigin-north'),
					'sanitize_callback' => array( 'SiteOrigin_Settings_Value_Sanitize', 'measurement' ),
					'live' => true,
				),

				'side_padding' => array(
					'type' => 'text',
					'label' => __('Side Padding', 'siteorigin-north'),
					'sanitize_callback' => array( 'SiteOrigin_Settings_Value_Sanitize', 'measurement' ),
					'live' => true,
				),

				'top_margin' => array(
					'type' => 'text',
					'label' => __('Top Margin', 'siteorigin-north'),
					'sanitize_callback' => array( 'SiteOrigin_Settings_Value_Sanitize', 'measurement' ),
					'live' => true,
				),
			),
		),
		'woocommerce' => array(
			'title' => __('WooCommerce', 'siteorigin-north'),
			'fields' => array(

				'display_cart' => array(
					'type' => 'checkbox',
					'label' => __('Display Cart', 'siteorigin-north'),
					'description' => __("Display WooCommerce cart in the main menu", 'siteorigin-north'),
				)

			)
		)
	) ) );
}
add_action('siteorigin_settings_init', 'siteorigin_north_settings_init');

/**
 * Tell the settings framework which settings we're using as fonts
 *
 * @param $settings
 *
 * @return array
 */
function siteorigin_north_font_settings( $settings ) {

	$settings['fonts_main'] = array(
		'name' => 'Droid Sans',
		'weights' => array(
			400, 700
		),
	);
	$settings['fonts_headings'] = array(
		'name' => 'Montserrat',
		'weights' => array(
			400
		),
	);
	$settings['fonts_details'] = array(
		'name' => 'Droid Serif',
		'weights' => array(
			400
		),
	);
	return $settings;
}
add_filter( 'siteorigin_settings_font_settings', 'siteorigin_north_font_settings' );

/**
 * Add custom CSS for the theme settings
 *
 * @param $css
 *
 * @return string
 */
function siteorigin_north_settings_custom_css($css){
	// Custom CSS Code
	$css .= '/* style */' . "\n" .
		'body,button,input,select,textarea {' . "\n" .
		'color: ${fonts_text_medium};' . "\n" .
		'.font( ${fonts_main} );' . "\n" .
		'}' . "\n" .
		'h1,h2,h3,h4,h5,h6 {' . "\n" .
		'.font( ${fonts_headings} );' . "\n" .
		'color: ${fonts_text_dark};' . "\n" .
		'}' . "\n" .
		'blockquote {' . "\n" .
		'color: ${branding_accent};' . "\n" .
		'}' . "\n" .
		'a {' . "\n" .
		'color: ${branding_accent};' . "\n" .
		'}' . "\n" .
		'a:hover,a:focus {' . "\n" .
		'color: ${branding_accent_dark};' . "\n" .
		'}' . "\n" .
		'button:hover, button:active, button:focus,' . "\n" .
		'input[type="button"]:hover, input[type="button"]:active, input[type="button"]:focus,' . "\n" .
		'input[type="reset"]:hover, input[type="reset"]:active, input[type="reset"]:focus,' . "\n" .
		'input[type="submit"]:hover, input[type="submit"]:active, input[type="submit"]:focus {' . "\n" .
		'background: ${branding_accent_dark};' . "\n" .
		'border-color: ${branding_accent_dark};' . "\n" .
		'}' . "\n" .
		'#header-search {' . "\n" .
		'background: ${masthead_background_color};' . "\n" .
		'}' . "\n" .
		'.content-area {' . "\n" .
		'margin: 0 -${structure_sidebar_width} 0 0;' . "\n" .
		'}' . "\n" .
		'body.rtl .content-area {' . "\n" .
		'margin: 0 0 0 -${structure_sidebar_width};' . "\n" .
		'}' . "\n" .
		'.site-main {' . "\n" .
		'margin: 0 ${structure_sidebar_width} 0 0;' . "\n" .
		'}' . "\n" .
		'body.rtl .site-main {' . "\n" .
		'margin: 0 0 0 ${structure_sidebar_width};' . "\n" .
		'}' . "\n" .
		'.site-content .widget-area {' . "\n" .
		'width: ${structure_sidebar_width};' . "\n" .
		'}' . "\n" .
		'#masthead {' . "\n" .
		'background: ${masthead_background_color};' . "\n" .
		'border-bottom: ${masthead_border_width} solid ${masthead_border_color};' . "\n" .
		'padding: ${masthead_padding} 0;' . "\n" .
		'margin-bottom: ${masthead_bottom_margin};' . "\n" .
		'}' . "\n" .
		'#masthead.layout-centered .site-branding {' . "\n" .
		'margin: 0 auto ${masthead_padding} auto;' . "\n" .
		'}' . "\n" .
		'.masthead-sentinel {' . "\n" .
		'margin-bottom: ${masthead_bottom_margin};' . "\n" .
		'}' . "\n" .
		'#topbar {' . "\n" .
		'background: ${masthead_top_background_color};' . "\n" .
		'border-bottom: ${masthead_border_width} solid ${masthead_border_color};' . "\n" .
		'}' . "\n" .
		'#topbar p {' . "\n" .
		'color: ${fonts_text_light};' . "\n" .
		'}' . "\n" .
		'#secondary {' . "\n" .
		'color: ${fonts_text_medium};' . "\n" .
		'}' . "\n" .
		'#secondary .widget-title {' . "\n" .
		'color: ${fonts_text_dark};' . "\n" .
		'}' . "\n" .
		'#colophon {' . "\n" .
		'margin-top: ${footer_top_margin};' . "\n" .
		'color: ${fonts_text_medium};' . "\n" .
		'border-top: ${footer_border_width} solid ${footer_border_color};' . "\n" .
		'background: ${footer_background_color};' . "\n" .
		'}' . "\n" .
		'#colophon .widgets .widget-wrapper {' . "\n" .
		'border-right: ${footer_border_width} solid ${footer_border_color};' . "\n" .
		'}' . "\n" .
		'#colophon .widgets aside {' . "\n" .
		'padding: ${footer_top_padding} ${footer_side_padding};' . "\n" .
		'}' . "\n" .
		'#colophon .widgets .widget-title {' . "\n" .
		'color: ${fonts_text_dark};' . "\n" .
		'}' . "\n" .
		'@media (max-width: 640px) {' . "\n" .
		'body.responsive #colophon .widgets .widget-wrapper {' . "\n" .
		'border-bottom: ${footer_border_width} solid ${footer_border_color};' . "\n" .
		'}' . "\n" .
		'}' . "\n" .
		'#colophon .site-info {' . "\n" .
		'border-top: ${footer_border_width} solid ${footer_border_color};' . "\n" .
		'}' . "\n" .
		'.entry-meta li,.entry-meta a,.entry-meta .meta-icon {' . "\n" .
		'color: ${fonts_text_meta};' . "\n" .
		'}' . "\n" .
		'.entry-meta li.hovering,.entry-meta li.hovering a,.entry-meta li.hovering .meta-icon {' . "\n" .
		'color: ${branding_accent_dark};' . "\n" .
		'}' . "\n" .
		'.breadcrumbs {' . "\n" .
		'color: ${fonts_text_light};' . "\n" .
		'}' . "\n" .
		'.breadcrumbs a:hover {' . "\n" .
		'color: ${branding_accent_dark};' . "\n" .
		'}' . "\n" .
		'.tags-list a:hover {' . "\n" .
		'background: ${branding_accent_dark};' . "\n" .
		'}' . "\n" .
		'.more-link {' . "\n" .
		'border: 1px solid ${fonts_text_dark};' . "\n" .
		'color: ${fonts_text_dark};' . "\n" .
		'.font( ${fonts_headings} );' . "\n" .
		'}' . "\n" .
		'.more-link:visited {' . "\n" .
		'color: ${fonts_text_dark};' . "\n" .
		'}' . "\n" .
		'.more-link:hover {' . "\n" .
		'background: ${branding_accent};' . "\n" .
		'border-color: ${branding_accent};' . "\n" .
		'}' . "\n" .
		'.post-pagination a {' . "\n" .
		'color: ${fonts_text_medium};' . "\n" .
		'}' . "\n" .
		'.post-pagination a:hover {' . "\n" .
		'color: ${branding_accent_dark};' . "\n" .
		'}' . "\n" .
		'.post-pagination .current {' . "\n" .
		'color: ${fonts_text_dark};' . "\n" .
		'}' . "\n" .
		'.post-pagination .page-numbers {' . "\n" .
		'color: ${fonts_text_medium};' . "\n" .
		'}' . "\n" .
		'.post-pagination .prev,.post-pagination .next {' . "\n" .
		'color: ${fonts_text_medium};' . "\n" .
		'}' . "\n" .
		'.comment-list li {' . "\n" .
		'color: ${fonts_text_light};' . "\n" .
		'}' . "\n" .
		'.comment-list li .comment-reply-link:hover {' . "\n" .
		'background: ${branding_accent_dark};' . "\n" .
		'}' . "\n" .
		'.comment-list li .info {' . "\n" .
		'color: ${fonts_text_meta};' . "\n" .
		'}' . "\n" .
		'.comment-list li .author {' . "\n" .
		'color: ${fonts_text_dark};' . "\n" .
		'}' . "\n" .
		'#commentform .comment-form-author input,#commentform .comment-form-email input,#commentform .comment-form-url input {' . "\n" .
		'color: ${fonts_text_medium};' . "\n" .
		'}' . "\n" .
		'#commentform .comment-form-comment textarea {' . "\n" .
		'color: ${fonts_text_medium};' . "\n" .
		'}' . "\n" .
		'#commentform .form-allowed-tags,#commentform .comment-notes,#commentform .logged-in-as {' . "\n" .
		'color: ${fonts_text_meta};' . "\n" .
		'}' . "\n" .
		'#commentform .form-submit input {' . "\n" .
		'color: ${fonts_text_dark};' . "\n" .
		'.font( ${fonts_headings} );' . "\n" .
		'}' . "\n" .
		'#commentform .form-submit input:hover {' . "\n" .
		'background: ${branding_accent_dark};' . "\n" .
		'border-color: ${branding_accent_dark};' . "\n" .
		'}' . "\n" .
		'/* woocommerce */' . "\n" .
		'.woocommerce #main ul.products li.product .price {' . "\n" .
		'color: ${branding_accent};' . "\n" .
		'}' . "\n" .
		'.woocommerce button.button.alt,.woocommerce #review_form #respond .form-submit input,.woocommerce .woocommerce-message .button,.woocommerce .products .button {' . "\n" .
		'.font( ${fonts_headings} );' . "\n" .
		'}' . "\n" .
		'.woocommerce button.button.alt:hover,.woocommerce #review_form #respond .form-submit input:hover,.woocommerce .woocommerce-message .button:hover,.woocommerce .products .button:hover {' . "\n" .
		'background: ${branding_accent_dark};' . "\n" .
		'border-color: ${branding_accent_dark};' . "\n" .
		'}' . "\n" .
		'.woocommerce .woocommerce-message {' . "\n" .
		'border-top-color: ${branding_accent};' . "\n" .
		'}' . "\n" .
		'.woocommerce.single #content div.product p.price {' . "\n" .
		'color: ${branding_accent};' . "\n" .
		'}' . "\n" .
		'.woocommerce.single #content div.product .woocommerce-tabs .tabs li.active {' . "\n" .
		'background: ${branding_accent};' . "\n" .
		'border-color: ${branding_accent};' . "\n" .
		'}';
	return $css;
}
add_filter( 'siteorigin_settings_custom_css', 'siteorigin_north_settings_custom_css' );

/**
 * Add CSS for mobile menu breakpoint
 */
function siteorigin_north_menu_breakpoint_css() {

	$breakpoint = siteorigin_setting( 'responsive_menu_breakpoint' );

	$css = '<style type="text/css" id="siteorigin-mobile-menu-css">' . "\t" .
	'/* responsive menu */' . "\t" .
	'@media screen and (max-width: ' . $breakpoint  . 'px) {' . "\t" .
		'body.responsive .main-navigation #mobile-menu-button {' .
			'display: inline-block;' .
		'}' . "\t" .
		'body.responsive .main-navigation ul {' .
			'display: none;' .
		'}' . "\t" .
		'body.responsive .main-navigation .north-icon-search {' .
			'display: none;' .
		'}' . "\t" .
		'.main-navigation #mobile-menu-button {' .
			'display: none;' .
		'}' . "\t" .
		'.main-navigation ul {' .
			'display: inline-block;' .
		'}' . "\t" .
		'.main-navigation .north-icon-search {' .
			'display: inline-block;' .
		'}' . "\t" .
	'}' . "\t" .
	'@media screen and (min-width: ' . ( 1 + $breakpoint ) . 'px) {' . "\t" .
		'body.responsive #mobile-navigation {' .
			'display: none !important;' .
			'}' . "\t" .
		'}' . "\t" .
	'</style>';

	echo $css;

}
add_action( 'wp_head', 'siteorigin_north_menu_breakpoint_css' );


/**
 * Add default settings.
 *
 * @param $defaults
 *
 * @return mixed
 */
function siteorigin_north_settings_defaults( $defaults ){
	// Branding defaults
	$defaults['branding_logo'] = false;
	$defaults['branding_logo_retina'] = false;
	$defaults['branding_site_description'] = true;
	$defaults['branding_accent'] = '#c75d5d';
	$defaults['branding_accent_dark'] = '#a94346';

	// Font defaults
	$defaults['fonts_text_dark'] = '#292929';
	$defaults['fonts_text_medium'] = '#595959';
	$defaults['fonts_text_light'] = '#898989';
	$defaults['fonts_text_meta'] = '#b0b0b0';

	// Double % because values are passed through get_theme_mod so must be escaped for sprintf
	$defaults['structure_sidebar_width'] = '35%%';

	// The masthead defaults
	$defaults['masthead_text_layout'] = 'default';
	$defaults['masthead_text_above'] = '';
	$defaults['masthead_background_color'] = '#fafafa';
	$defaults['masthead_top_background_color'] = false;
	$defaults['masthead_border_color'] = '#d4d4d4';
	$defaults['masthead_border_width'] = '1px';
	$defaults['masthead_padding'] = '30px';
	$defaults['masthead_bottom_margin'] = '30px';

	// Navigation settings
	$defaults['navigation_search'] = true;
	$defaults['navigation_sticky'] = true;
	$defaults['navigation_sticky_scale'] = true;
	$defaults['navigation_resize_logo'] = true;
	$defaults['navigation_post'] = true;
	$defaults['navigation_scroll_to_top'] = true;
	$defaults['navigation_smooth_scroll'] = true;

	// Responsive settings
	$defaults['responsive_disabled'] = false;
	$defaults['responsive_fitvids'] = true;
	$defaults['responsive_menu_breakpoint'] = '600';
	$defaults['responsive_menu_text'] = __('Menu', 'siteorigin-north');

	// Blog settings
	$defaults['blog_featured_archive'] = true;
	$defaults['blog_featured_single'] = true;
	$defaults['blog_display_author_box'] = false;
	$defaults['blog_display_date'] = true;
	$defaults['blog_display_author'] = true;
	$defaults['blog_display_comment_count'] = true;

	// Footer defaults
	$defaults['footer_text'] = __('Copyright © {year} {sitename}', 'siteorigin-north');
	$defaults['footer_constrained'] = false;
	$defaults['footer_background_color'] = '#fafafa';
	$defaults['footer_border_color'] = '#d4d4d4';
	$defaults['footer_border_width'] = '1px';
	$defaults['footer_top_padding'] = '40px';
	$defaults['footer_side_padding'] = '40px';
	$defaults['footer_top_margin'] = '30px';

	// WooCommerce defaults
	$defaults['woocommerce_display_cart'] = true;

	return $defaults;
}
add_filter('siteorigin_settings_defaults', 'siteorigin_north_settings_defaults');


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
				'full-width-sidebar' => __( 'Full Width, With Sidebar', 'siteorigin-north' ),
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
	$defaults['layout'] = 'default';
	$defaults['menu'] = 'default';
	$defaults['page_title'] = true;
	$defaults['masthead_margin'] = true;
	$defaults['footer_margin'] = true;
	return $defaults;
}
add_filter('siteorigin_page_settings_defaults', 'siteorigin_north_setup_page_setting_defaults');

/**
 * Change the default page settings for the home page.
 *
 * @param $settings
 *
 * @return mixed
 */
function siteorigin_north_page_settings_panels_defaults( $settings ){
	$settings['layout'] = 'no-sidebar';
	$settings['page_title'] = false;
	return $settings;
}
add_filter('siteorigin_page_settings_panels_home_defaults', 'siteorigin_north_page_settings_panels_defaults');
