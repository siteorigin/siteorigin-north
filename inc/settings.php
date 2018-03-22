<?php

/**
 * Initialize the settings
 */
function siteorigin_north_settings_init() {

	SiteOrigin_Settings::single()->configure( apply_filters( 'siteorigin_north_settings_array', array(

		'branding'    => array(
			'title'  => __( 'Branding', 'siteorigin-north' ),
			'fields' => array(
				'logo'             => array(
					'type'        => 'media',
					'label'       => __( 'Logo', 'siteorigin-north' ),
					'description' => __( 'Logo displayed in your masthead.', 'siteorigin-north' )
				),
				'retina_logo'      => array(
					'type'        => 'media',
					'label'       => __( 'Retina Logo', 'siteorigin-north' ),
					'description' => __( 'A double sized logo to use on retina devices.', 'siteorigin-north' )
				),
				'site_title' => array(
					'type'        => 'checkbox',
					'label'       => __( 'Site Title', 'siteorigin-north' ),
					'description' => __( 'Show your site title alongside your logo.', 'siteorigin-north' )
				),
				'site_description' => array(
					'type'        => 'checkbox',
					'label'       => __( 'Site Description', 'siteorigin-north' ),
					'description' => __( 'Show your site description below your site title or logo.', 'siteorigin-north' )
				),
				'attribution' => array(
					'type' => 'checkbox',
					'label' => __('Hide SiteOrigin Attribution', 'siteorigin-north'),
					'description' => __('Hide the SiteOrigin link in your footer.', 'siteorigin-north'),
					'teaser' => true,
				),
				'accent'           => array(
					'type'        => 'color',
					'label'       => __( 'Accent Color', 'siteorigin-north' ),
					'description' => __( 'The color used for links and various other accents.', 'siteorigin-north' ),
					'live'        => true,
				),
				'accent_dark'      => array(
					'type'        => 'color',
					'label'       => __( 'Dark Accent Color', 'siteorigin-north' ),
					'description' => __( 'A darker version of your accent color.', 'siteorigin-north' ),
					'live'        => true,
				),
			)
		),
		'fonts' => array(
			'title' => __( 'Fonts', 'siteorigin-north' ),
			'fields' => array(

				'main'        => array(
					'type'        => 'font',
					'label'       => __( 'Main Font', 'siteorigin-north' ),
					'description' => __( 'Main font used on your site.', 'siteorigin-north' ),
					'live'        => true,
				),
				'headings'    => array(
					'type'        => 'font',
					'label'       => __( 'Headings font', 'siteorigin-north' ),
					'description' => __( 'Font used for headings.', 'siteorigin-north' ),
					'live'        => true,
				),
				'details'     => array(
					'type'        => 'font',
					'label'       => __( 'Details font', 'siteorigin-north' ),
					'description' => __( 'Font used for smaller details.', 'siteorigin-north' ),
					'live'        => true,
				),
				'menu'     => array(
					'type'        => 'font',
					'label'       => __( 'Menu font', 'siteorigin-north' ),
					'description' => __( 'Font used for menu items.', 'siteorigin-north' ),
					'live'        => true,
				),

				'text_dark'   => array(
					'type'        => 'color',
					'label'       => __( 'Dark Text Color', 'siteorigin-north' ),
					'description' => __( 'Applied to headings and titles.', 'siteorigin-north' ),
					'live'        => true,
				),
				'text_medium' => array(
					'type'        => 'color',
					'label'       => __( 'Medium Text Color', 'siteorigin-north' ),
					'description' => __( 'Default color applied to all text.', 'siteorigin-north' ),
					'live'        => true,
				),
				'text_light'  => array(
					'type'        => 'color',
					'label'       => __( 'Light Text Color', 'siteorigin-north' ),
					'description' => __( 'Applied to comments and breadcrumbs.', 'siteorigin-north' ),
					'live'        => true,
				),
				'text_meta'   => array(
					'type'        => 'color',
					'label'       => __( 'Meta Text Color', 'siteorigin-north' ),
					'description' => __( 'Applied to bylines.', 'siteorigin-north' ),
					'live'        => true,
				),
				'text_menu'   => array(
					'type'  => 'color',
					'label' => __( 'Menu Text Color', 'siteorigin-north' ),
					'live'  => true,
				),
				'text_menu_hover'   => array(
					'type'  => 'color',
					'label' => __( 'Menu Text Hover Color', 'siteorigin-north' ),
					'live'  => true,
				),
				'text_menu_current'   => array(
					'type'  => 'color',
					'label' => __( 'Menu Text Current Color', 'siteorigin-north' ),
					'live'  => true,
				),
			),
		),

		'icons' => array(
			'title' => __('Icons', 'siteorigin-north'),
			'fields' => array(

				'menu' => array(
					'type' => 'media',
					'label' => __('Mobile menu icon', 'siteorigin-north'),
				),
				'search' => array(
					'type' => 'media',
					'label' => __('Masthead search icon', 'siteorigin-north'),
				),
				'close_search' => array(
					'type' => 'media',
					'label' => __('Close search bar icon', 'siteorigin-north'),
				),
				'scroll_to_top' => array(
					'type' => 'media',
					'label' => __('Scroll to top icon', 'siteorigin-north'),
				),
			),
		),

		'structure' => array(
			'title' => __('Page Structure', 'siteorigin-north'),
			'fields' => array(
				'sidebar_width' => array(
					'label'             => __( 'Sidebar Width', 'siteorigin-north' ),
					'type'              => 'measurement',
					'live'              => true,
				),
				'sidebar_position'               => array(
					'type'    => 'select',
					'label'   => __( 'Sidebar Position', 'siteorigin-north' ),
					'options' => array(
						'right'  => __( 'Right', 'siteorigin-north' ),
						'left' => __( 'Left', 'siteorigin-north' ),
					)
				),
			)
		),
		'masthead'    => array(
			'title'  => __( 'Header', 'siteorigin-north' ),
			'fields' => array(
				'layout'               => array(
					'type'    => 'select',
					'label'   => __( 'Header layout', 'siteorigin-north' ),
					'options' => array(
						'default'  => __( 'Default', 'siteorigin-north' ),
						'centered' => __( 'Centered', 'siteorigin-north' ),
					)
				),
				'text_above'           => array(
					'type'              => 'text',
					'label'             => __( 'Text Above', 'siteorigin-north' ),
					'description'       => __( 'Text that goes above the main header.', 'siteorigin-north' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'background_color'     => array(
					'type'  => 'color',
					'label' => __( 'Background Color', 'siteorigin-north' ),
					'live'  => true,
				),
				'top_background_color' => array(
					'type'  => 'color',
					'label' => __( 'Background Top Color', 'siteorigin-north' ),
					'live'  => true,
				),
				'border_color'         => array(
					'type'  => 'color',
					'label' => __( 'Border Color', 'siteorigin-north' ),
					'live'  => true,
				),
				'border_width'         => array(
					'type'              => 'measurement',
					'label'             => __( 'Border Width', 'siteorigin-north' ),
					'live'              => true,
				),
				'padding'              => array(
					'type'              => 'measurement',
					'label'             => __( 'Padding', 'siteorigin-north' ),
					'live'              => false,
				),
				'top_padding'          => array(
					'type'              => 'measurement',
					'label'             => __( 'Top Bar Widgets Padding', 'siteorigin-north' ),
					'live'              => false,
				),
				'bottom_margin'        => array(
					'type'              => 'measurement',
					'label'             => __( 'Bottom Margin', 'siteorigin-north' ),
					'live'              => true,
				),
			)
		),
		'navigation'  => array(
			'title'  => __( 'Navigation', 'siteorigin-north' ),
			'fields' => array(
				'search'        => array(
					'type'        => 'checkbox',
					'label'       => __( 'Menu search', 'siteorigin-north' ),
					'description' => __( 'Display search in main menu', 'siteorigin-north' ),
				),
				'sticky'        => array(
					'type'        => 'checkbox',
					'label'       => __( 'Sticky menu', 'siteorigin-north' ),
					'description' => __( 'Stick menu to top of screen', 'siteorigin-north' ),
				),
				'sticky_scale'  => array(
					'type'        => 'checkbox',
					'label'       => __( 'Sticky menu scales logo', 'siteorigin-north' ),
					'description' => __( 'Should the main logo be downscaled when scrolling', 'siteorigin-north' ),
				),
				'post'          => array(
					'type'        => 'checkbox',
					'label'       => __( 'Post navigation', 'siteorigin-north' ),
					'description' => __( 'Display next and previous post navigation', 'siteorigin-north' ),
				),
				'scroll_to_top' => array(
					'type'        => 'checkbox',
					'label'       => __( 'Scroll to top', 'siteorigin-north' ),
					'description' => __( 'Display a scroll to top button', 'siteorigin-north' ),
				),
				'scroll_to_top_mobile' => array(
					'type'        => 'checkbox',
					'label'       => __( 'Scroll to top on mobile', 'siteorigin-north' ),
					'description' => __( 'Display the scroll to top button on smaller screens', 'siteorigin-north' ),
				),
				'smooth_scroll' => array(
					'type'        => 'checkbox',
					'label'       => __( 'Smooth scroll', 'siteorigin-north' ),
					'description' => __( 'Smooth scroll for internal anchor links', 'siteorigin-north' ),
				)
			),
		),
		'blog'                    => array(
			'title'                  => __( 'Blog', 'siteorigin-north' ),
			'fields'                 => array(
				'featured_archive'      => array(
					'type'                 => 'checkbox',
					'label'                => __( 'Featured image on archive', 'siteorigin-north' ),
				),
				'post_content'          => array(
					'type'                 => 'select',
					'label'                => __( 'Archive Post Content', 'siteorigin-north' ),
					'description'          => __( 'Choose how to display your post content on blog and archive pages. Select Full Post Content if using the "more" quicktag.', 'siteorigin-north' ),
					'options'              => array(
						'content'             => __( 'Full Post Content', 'siteorigin-north' ),
						'excerpt'             => __( 'Post Excerpt', 'siteorigin-north' ),
					)
				),
				'read_more_text'        => array(
					'type'                 => 'text',
					'label'                => __( 'Read More Text', 'siteorigin-north' ),
					'description'          => __( 'The button text displayed when posts are split using the "more" quicktag.', 'siteorigin-north' ),
				),
				'excerpt_length'        => array(
					'type'                 => 'number',
					'label'                => __( 'Excerpt Length', 'siteorigin-north' ),
					'description'          => __( 'If no manual post excerpt is added one will be generated. How many words should it be? Only applicable if Post Excerpt has been selected from the Archive Post Content setting.', 'siteorigin-north' ),
				),
				'excerpt_post_link'     => array(
					'type'                 => 'checkbox',
					'label'                => __( 'Post Excerpt Read More Link', 'siteorigin-north' ),
					'description'          => __( 'Display the Read More Text below the post excerpt. Only applicable if Post Excerpt has been selected from the Archive Post Content setting.', 'siteorigin-north' )
				),
				'featured_single'       => array(
					'type'                 => 'checkbox',
					'label'                => __( 'Featured image on single', 'siteorigin-north' ),
				),
				'display_author_box'    => array(
					'type'                 => 'checkbox',
					'label'                => __( 'Display author box on single', 'siteorigin-north' ),
				),
				'display_date'          => array(
					'type'                 => 'checkbox',
					'label'                => __( 'Display date', 'siteorigin-north' ),
				),
				'display_author'        => array(
					'type'                 => 'checkbox',
					'label'                => __( 'Display author', 'siteorigin-north' ),
				),
				'display_comment_count' => array(
					'type'                 => 'checkbox',
					'label'                => __( 'Display comment count', 'siteorigin-north' ),
				),
				'ajax_comments'         => array(
					'type'                 => 'checkbox',
					'label'                => __('Ajax Comments', 'siteorigin-north'),
					'description'          => __('Keep the conversation flowing with ajax loading comments.', 'siteorigin-north'),
					'teaser'               => true,
				)
			)
		),
		'responsive'  => array(
			'title'  => __( 'Responsive', 'siteorigin-north' ),
			'fields' => array(
				'disabled'        => array(
					'type'  => 'checkbox',
					'label' => __( 'Disable Responsive Layout', 'siteorigin-north' ),
				),
				'menu_text'       => array(
					'type'  => 'text',
					'label' => __( 'Mobile Menu Text', 'siteorigin-north' ),
				),
				'mobile_text_color' => array(
					'type'        => 'color',
					'label'       => __( 'Mobile Menu Text Color', 'siteorigin-north' ),
					'live'        => true,
				),
				'mobile_icon_color' => array(
					'type'        => 'color',
					'label'       => __( 'Mobile Menu Icon Color', 'siteorigin-north' ),
					'live'        => true,
				),
				'menu_breakpoint' => array(
					'label'       => __( 'Menu Breakpoint', 'siteorigin-north' ),
					'type'        => 'text',
					'description' => __( 'Screen width in px.', 'siteorigin-north' )
				),
				'mobile_menu_background_color' => array(
					'type'        => 'color',
					'label'       => __( 'Mobile Menu Background Color', 'siteorigin-north' ),
					'live'        => true,
				),
				'mobile_menu_background_opacity' => array(
					'type'        => 'range',
					'label'       => __( 'Mobile Menu Background Opacity', 'siteorigin-north' ),
					'min'         => 0,
					'max'         => 1,
					'step'        => 0.01,
					'live'        => true,
				),
				'mobile_menu_text_color' => array(
					'type'        => 'color',
					'label'       => __( 'Mobile Menu Dropdown Text Color', 'siteorigin-north' ),
					'live'        => true,
				),
				'fitvids'         => array(
					'type'  => 'checkbox',
					'label' => __( 'Use Fitvids', 'siteorigin-north' ),
					'description' => __( 'Include FitVids.js for fluid width video embeds.', 'siteorigin-north' ),
				)
			)
		),
		'footer'      => array(
			'title'  => __( 'Footer', 'siteorigin-north' ),
			'fields' => array(

				'text'             => array(
					'type'              => 'text',
					'label'             => __( 'Footer Text', 'siteorigin-north' ),
					'description'       => __( "{sitename} and {year} are your site's name and current year", 'siteorigin-north' ),
					'sanitize_callback' => 'wp_kses_post',
				),
				'widget_title_color' => array(
					'type'  => 'color',
					'label' => __( 'Widget Title Color', 'siteorigin-north' ),
					'live'  => true,
				),
				'text_color' => array(
					'type'  => 'color',
					'label' => __( 'Text Color', 'siteorigin-north' ),
					'live'  => true,
				),
				'link_color' => array(
					'type'  => 'color',
					'label' => __( 'Link Color', 'siteorigin-north' ),
					'live'  => true,
				),
				'link_hover_color' => array(
					'type'  => 'color',
					'label' => __( 'Link Hover Color', 'siteorigin-north' ),
					'live'  => true,
				),
				'constrained'      => array(
					'type'        => 'checkbox',
					'label'       => __( 'Constrain', 'siteorigin-north' ),
					'description' => __( "Constrain the footer width", 'siteorigin-north' ),
				),
				'background_color' => array(
					'type'  => 'color',
					'label' => __( 'Background Color', 'siteorigin-north' ),
					'live'  => true,
				),
				'border_color'     => array(
					'type'  => 'color',
					'label' => __( 'Border Color', 'siteorigin-north' ),
					'live'  => true,
				),
				'border_width'     => array(
					'type'              => 'measurement',
					'label'             => __( 'Border Width', 'siteorigin-north' ),
					'live'              => true,
				),
				'top_padding'      => array(
					'type'              => 'measurement',
					'label'             => __( 'Top Padding', 'siteorigin-north' ),
					'live'              => true,
				),
				'side_padding'     => array(
					'type'              => 'measurement',
					'label'             => __( 'Side Padding', 'siteorigin-north' ),
					'description' 		=> __( "Only applied when footer width is unconstrained.", 'siteorigin-north' ),
					'live'              => true,
				),
				'top_margin'       => array(
					'type'              => 'measurement',
					'label'             => __( 'Top Margin', 'siteorigin-north' ),
					'live'              => true,
				),
			),
		),
	) ) );
}
add_action( 'siteorigin_settings_init', 'siteorigin_north_settings_init' );

function siteorigin_north_woocommerce_settings( $settings ) {
	if ( ! function_exists( 'is_woocommerce' ) ) return $settings;

	$wc_settings = array(
		'woocommerce' => array(
			'title'  => esc_html__( 'WooCommerce', 'siteorigin-north' ),
			'fields' => array(

				'archive_columns' => array(
					'type' => 'range',
					'label' => esc_html__( 'Number of Products per Row', 'siteorigin-north' ),
					'description' => esc_html__( 'Set the number of products per row on shop archive pages.', 'siteorigin-north' ),
					'min' => 2,
					'max' => 5,
					'step' => 1
				),

				'display_cart' => array(
					'type' => 'checkbox',
					'label' => esc_html__( 'Display Cart', 'siteorigin-north' ),
					'description' => esc_html__( 'Display WooCommerce cart in the main menu.', 'siteorigin-north' ),
				),

				'display_checkout_cart' => array(
					'type' => 'checkbox',
					'label' => esc_html__( 'Display Cart in Checkout', 'siteorigin-north' ),
					'description' => esc_html__( 'Display WooCommerce cart in the main menu on cart and checkout page.', 'siteorigin-north' ),
				),

				'display_quick_view' => array(
					'type' => 'checkbox',
					'label' => esc_html__( 'Display Quick View button', 'siteorigin-north' ),
				),

				'sidebar_position' => array(
					'type' => 'select',
					'label' => esc_html__( 'Shop Sidebar Position', 'siteorigin-north' ),
					'options' => array(
						'left' => esc_html__( 'Left', 'siteorigin-north' ),
						'right' => esc_html__( 'Right', 'siteorigin-north' ),
						'none' => esc_html__( 'None', 'siteorigin-north' ),
					),
				),				

			)
		)
	);

	return array_merge( $settings, $wc_settings );
}
add_filter( 'siteorigin_north_settings_array', 'siteorigin_north_woocommerce_settings' );

/**
 * Tell the settings framework which settings we're using as fonts.
 *
 * @param $settings
 *
 * @return array
 */
function siteorigin_north_font_settings( $settings ) {

	$settings['fonts_main'] = array(
		'name' => 'Droid Sans',
		'weights' => array(
			400,
			700
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
	$settings['fonts_menu'] = array(
		'name' => 'Droid Sans',
		'weights' => array(
			400,
			700
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
function siteorigin_north_settings_custom_css( $css ) {
	// Custom CSS.
	$css .= '/* style */
	body,button,input,select,textarea {
	color: ${fonts_text_medium};
	.font( ${fonts_main} );
	}
	h1,h2,h3,h4,h5,h6 {
	.font( ${fonts_headings} );
	color: ${fonts_text_dark};
	}
	blockquote {
	.font( ${fonts_details} );
	color: ${branding_accent};
	}
	#page ::-moz-selection {
	background-color: ${branding_accent};
	}
	#page ::selection {
	background-color: ${branding_accent};
	}
	button,input[type="button"],input[type="reset"],input[type="submit"] {
	color: ${fonts_text_dark};
	.font( ${fonts_headings} );
	}
	button:hover,button:active,button:focus,input[type="button"]:hover,input[type="button"]:active,input[type="button"]:focus,input[type="reset"]:hover,input[type="reset"]:active,input[type="reset"]:focus,input[type="submit"]:hover,input[type="submit"]:active,input[type="submit"]:focus {
	background: ${branding_accent_dark};
	border-color: ${branding_accent_dark};
	}
	input[type="text"],input[type="email"],input[type="url"],input[type="password"],input[type="search"],input[type="tel"],textarea {
	color: ${fonts_text_medium};
	.font( ${fonts_details} );
	}
	.wpcf7 input.wpcf7-form-control.wpcf7-text,.wpcf7 input.wpcf7-form-control.wpcf7-number,.wpcf7 input.wpcf7-form-control.wpcf7-date,.wpcf7 textarea.wpcf7-form-control.wpcf7-textarea,.wpcf7 select.wpcf7-form-control.wpcf7-select,.wpcf7 input.wpcf7-form-control.wpcf7-quiz {
	color: ${fonts_text_medium};
	.font( ${fonts_details} );
	}
	.wpcf7 input.wpcf7-form-control.wpcf7-submit[disabled] {
	color: ${fonts_text_light};
	border: 2px solid ${fonts_text_light};
	}
	.wpcf7 input.wpcf7-form-control.wpcf7-submit[disabled]:hover {
	color: ${fonts_text_light};
	border: 2px solid ${fonts_text_light};
	}
	.wpcf7 .wpcf7-response-output {
	color: ${fonts_text_dark};
	}
	a {
	color: ${branding_accent};
	}
	a:hover,a:focus {
	color: ${branding_accent_dark};
	}
	.main-navigation {
	.font( ${fonts_menu} );
	}
	.main-navigation ul a {
	color: ${fonts_text_menu};
	}
	.main-navigation ul a:hover {
	color: ${fonts_text_menu_hover};
	}
	.main-navigation ul ul {
	background-color: ${masthead_background_color};
	border: 1px solid ${masthead_border_color};
	}
	.main-navigation ul ul :hover > a,.main-navigation ul ul .focus > a {
	color: ${fonts_text_menu_hover};
	}
	.main-navigation ul ul a:hover,.main-navigation ul ul a.focus {
	color: ${fonts_text_menu_hover};
	}
	.main-navigation .menu > li.current-menu-item > a,.main-navigation .menu > li.current-menu-ancestor > a {
	color: ${fonts_text_menu_current};
	}
	.main-navigation .icon-menu span {
	background: ${responsive_mobile_icon_color};
	}
	.main-navigation #mobile-menu-button {
	color: ${responsive_mobile_text_color};
	}
	.main-navigation #mobile-menu-button:hover {
	color: ${fonts_text_menu_hover};
	}
	.main-navigation .north-search-icon .svg-icon-search path {
	fill: ${fonts_text_menu};
	}
	.main-navigation .north-search-icon .svg-icon-search:hover path {
	fill: ${fonts_text_menu_hover};
	}
	#header-search {
	background: ${masthead_background_color};
	}
	#header-search input[type="search"] {
	.font( ${fonts_details} );
	}
	#header-search #close-search .svg-icon-close path {
	fill: ${fonts_text_menu};
	}
	#header-search #close-search .svg-icon-close:hover path {
	fill: ${fonts_text_menu_hover};
	}
	.main-navigation.stripped a {
	color: ${fonts_text_menu};
	}
	.main-navigation.stripped a:hover {
	color: ${fonts_text_menu_hover};
	}
	#mobile-navigation {
	.font( ${fonts_menu} );
	background: .rgba( ${responsive_mobile_menu_background_color}, ${responsive_mobile_menu_background_opacity});
	}
	#mobile-navigation form input[type="search"] {
	color: ${responsive_mobile_menu_text_color};
	border-bottom: 1px solid ${responsive_mobile_menu_text_color};
	}
	#mobile-navigation form input[type="search"]::-webkit-input-placeholder {
	color: .rgba( ${responsive_mobile_menu_text_color}, 0.7);
	}
	#mobile-navigation form input[type="search"]::-moz-placeholder {
	color: .rgba( ${responsive_mobile_menu_text_color}, 0.7);
	}
	#mobile-navigation form input[type="search"]:-moz-placeholder {
	color: .rgba( ${responsive_mobile_menu_text_color}, 0.7);
	}
	#mobile-navigation form input[type="search"]:-ms-input-placeholder {
	color: .rgba( ${responsive_mobile_menu_text_color}, 0.7);
	}
	#mobile-navigation ul li a {
	color: ${responsive_mobile_menu_text_color};
	}
	#mobile-navigation ul li .dropdown-toggle {
	color: ${responsive_mobile_menu_text_color};
	}
	.search-form .search-field {
	.font( ${fonts_details} );
	}
	.tagcloud a {
	background: ${fonts_text_meta};
	}
	.tagcloud a:hover {
	background: ${branding_accent_dark};
	}
	.widget-area .widget_recent_entries ul li .post-date {
	color: ${fonts_text_meta};
	}
	.widget-area .widget_rss ul li cite,.widget-area .widget_rss ul li .rss-date {
	color: ${fonts_text_meta};
	}
	.content-area {
	margin: 0 -${structure_sidebar_width} 0 0;
	}
	.site-main {
	margin: 0 ${structure_sidebar_width} 0 0;
	}
	.site-content .widget-area {
	width: ${structure_sidebar_width};
	}
	.layout-sidebar-left:not(.woocommerce):not(.woocommerce-page) .content-area,.layout-wc-sidebar-left .content-area {
	margin: 0 0 0 -${structure_sidebar_width};
	}
	.layout-sidebar-left:not(.woocommerce):not(.woocommerce-page) .site-main,.layout-wc-sidebar-left .site-main {
	margin: 0 0 0 ${structure_sidebar_width};
	}
	.layout-sidebar-left:not(.woocommerce):not(.woocommerce-page) .site-content .widget-area,.layout-wc-sidebar-left .site-content .widget-area {
	width: ${structure_sidebar_width};
	}
	#masthead {
	background: ${masthead_background_color};
	border-bottom: ${masthead_border_width} solid ${masthead_border_color};
	padding: ${masthead_padding} 0;
	margin-bottom: ${masthead_bottom_margin};
	}
	#masthead .site-branding .site-title,#masthead .site-branding .logo-site-title {
	color: ${fonts_text_dark};
	.font( ${fonts_headings} );
	}
	#masthead.layout-centered .site-branding {
	margin: 0 auto ${masthead_padding} auto;
	}
	.masthead-sentinel {
	margin-bottom: ${masthead_bottom_margin};
	}
	#topbar {
	background: ${masthead_top_background_color};
	border-bottom: ${masthead_border_width} solid ${masthead_border_color};
	}
	#topbar p {
	color: ${fonts_text_light};
	}
	#topbar #topbar-widgets {
	padding-top: ${masthead_top_padding};
	padding-bottom: ${masthead_top_padding};
	}
	#secondary {
	color: ${fonts_text_medium};
	}
	#secondary .widget-title {
	color: ${fonts_text_dark};
	}
	#colophon {
	background: ${footer_background_color};
	color: ${footer_text_color};
	margin-top: ${footer_top_margin};
	}
	#colophon.footer-active-sidebar {
	border-top: ${footer_border_width} solid ${footer_border_color};
	}
	#colophon a {
	color: ${footer_link_color};
	}
	#colophon a:hover {
	color: ${footer_link_hover_color};
	}
	#colophon .widgets .widget-wrapper {
	border-right: ${footer_border_width} solid ${footer_border_color};
	}
	#colophon .widgets aside {
	padding: ${footer_top_padding} ${footer_side_padding};
	}
	#colophon .widgets .widget-title {
	color: ${footer_widget_title_color};
	}
	@media (max-width: 640px) {
	body.responsive #colophon .widgets .widget-wrapper {
	border-bottom: ${footer_border_width} solid ${footer_border_color};
	}
	}
	#colophon .site-info {
	border-top: ${footer_border_width} solid ${footer_border_color};
	color: ${footer_text_color};
	}
	.entry-title {
	color: ${fonts_text_dark};
	}
	.entry-meta {
	.font( ${fonts_details} );
	}
	.entry-meta li,.entry-meta a,.entry-meta .meta-icon {
	color: ${fonts_text_meta};
	}
	.entry-meta li.hovering,.entry-meta li.hovering a,.entry-meta li.hovering .meta-icon {
	color: ${branding_accent_dark};
	}
	.breadcrumbs {
	.font( ${fonts_details} );
	color: ${fonts_text_light};
	}
	.breadcrumbs a:hover {
	color: ${branding_accent_dark};
	}
	.page-content,.entry-content,.entry-summary {
	color: ${fonts_text_medium};
	}
	.tags-list a {
	background: ${fonts_text_meta};
	}
	.tags-list a:hover {
	background: ${branding_accent_dark};
	}
	.more-link {
	border: 1px solid ${fonts_text_dark};
	color: ${fonts_text_dark};
	.font( ${fonts_headings} );
	}
	.more-link:visited {
	color: ${fonts_text_dark};
	}
	.more-link:hover {
	background: ${branding_accent};
	border-color: ${branding_accent};
	}
	.post-pagination {
	.font( ${fonts_details} );
	}
	.post-pagination a {
	color: ${fonts_text_medium};
	}
	.post-pagination a:hover {
	color: ${branding_accent_dark};
	}
	.post-pagination .current {
	color: ${fonts_text_dark};
	}
	.post-pagination .page-numbers {
	color: ${fonts_text_medium};
	}
	.post-pagination .prev,.post-pagination .next {
	color: ${fonts_text_medium};
	}
	.comment-list li.comment {
	color: ${fonts_text_light};
	}
	.comment-list li.comment .comment-reply-link {
	color: ${fonts_text_meta};
	background: ${fonts_text_dark};
	}
	.comment-list li.comment .comment-reply-link:hover {
	background: ${branding_accent_dark};
	}
	.comment-list li.comment .info {
	color: ${fonts_text_meta};
	}
	.comment-list li.comment .author {
	color: ${fonts_text_dark};
	}
	#commentform .form-allowed-tags,#commentform .comment-notes,#commentform .logged-in-as {
	color: ${fonts_text_meta};
	}
	#commentform .form-submit input {
	color: ${fonts_text_dark};
	.font( ${fonts_headings} );
	}
	#commentform .form-submit input:hover {
	background: ${branding_accent_dark};
	border-color: ${branding_accent_dark};
	}';
	return $css;
}
add_filter( 'siteorigin_settings_custom_css', 'siteorigin_north_settings_custom_css' );

/**
 * Add custom CSS for the theme woocommerce elements
 *
 * @param $css
 *
 * @return string
 */
function siteorigin_north_wc_settings_custom_css( $css ) {
	if ( ! function_exists( 'is_woocommerce' ) ) return $css;

	// Custom WooCommerce CSS.
	$css .= '/* woocommerce */
	.woocommerce .woocommerce-ordering .ordering-selector-wrapper {
	color: ${fonts_text_light};
	}
	.woocommerce .woocommerce-ordering .ordering-selector-wrapper .north-icon-next {
	color: ${fonts_text_light};
	}
	.woocommerce .woocommerce-ordering .ordering-selector-wrapper .ordering-dropdown li {
	color: ${fonts_text_light};
	}
	.woocommerce .woocommerce-ordering .ordering-selector-wrapper .ordering-dropdown li:hover {
	color: ${fonts_text_dark};
	}
	.woocommerce .woocommerce-ordering .ordering-selector-wrapper.open-dropdown .north-icon-next {
	color: ${fonts_text_dark};
	}
	.woocommerce .woocommerce-result-count {
	color: ${fonts_text_meta};
	.font( ${fonts_details} );
	}
	.woocommerce #main ul.products li.product h3 {
	color: ${fonts_text_dark};
	}
	.woocommerce #main ul.products li.product .price {
	.font( ${fonts_details} );
	color: ${branding_accent};
	}
	.woocommerce button.button.alt,.woocommerce #review_form #respond .form-submit input,.woocommerce .woocommerce-message .button,.woocommerce .products .button {
	color: ${fonts_text_dark};
	.font( ${fonts_headings} );
	}
	.woocommerce button.button.alt:hover,.woocommerce #review_form #respond .form-submit input:hover,.woocommerce .woocommerce-message .button:hover,.woocommerce .products .button:hover {
	background: ${branding_accent_dark};
	border-color: ${branding_accent_dark};
	}
	.woocommerce .woocommerce-message {
	border-top-color: ${branding_accent};
	}
	.woocommerce.single #content div.product p.price {
	color: ${branding_accent};
	.font( ${fonts_details} );
	}
	.woocommerce.single #content div.product .woocommerce-product-rating .woocommerce-review-link {
	color: ${fonts_text_medium};
	}
	.woocommerce.single #content div.product .woocommerce-tabs .tabs li a {
	color: ${fonts_text_dark};
	}
	.woocommerce.single #content div.product .woocommerce-tabs .tabs li.active {
	background: ${branding_accent};
	border-color: ${branding_accent};
	}
	.woocommerce.single #content div.product .product-under-title-meta {
	color: ${fonts_text_medium};
	}
	.woocommerce.single #content div.product #comments h2 {
	color: ${fonts_text_dark};
	}
	.woocommerce .button.wc-backward {
	.font( ${fonts_headings} );
	border: 1px solid ${fonts_text_dark};
	color: ${fonts_text_dark};
	}
	.woocommerce .button.wc-backward:hover {
	background: ${branding_accent_dark};
	border-color: ${branding_accent_dark};
	}
	.woocommerce table.shop_table td.product-price,.woocommerce table.shop_table td.product-subtotal {
	color: ${branding_accent};
	}
	.woocommerce table.shop_table .remove:hover {
	background-color: ${branding_accent_dark};
	}
	.woocommerce table.shop_table .cart_totals .amount {
	color: ${branding_accent};
	}
	.woocommerce table.shop_table .button {
	.font( ${fonts_headings} );
	border: 1px solid ${fonts_text_dark};
	color: ${fonts_text_dark};
	}
	.woocommerce table.shop_table .button.checkout-button {
	background: ${branding_accent};
	border: 1px solid ${branding_accent};
	}
	.woocommerce table.shop_table .button:hover {
	background: ${branding_accent_dark};
	border-color: ${branding_accent_dark};
	}
	#mobile-navigation .shopping-cart-link {
	color: ${responsive_mobile_menu_text_color};
	}
	#mobile-navigation .shopping-cart-link .shopping-cart-count {
	border: 2px solid .rgba( ${responsive_mobile_menu_text_color}, 0.8);
	}
	.main-navigation .shopping-cart .north-icon-cart {
	color: ${fonts_text_menu};
	}
	.main-navigation .shopping-cart:hover .north-icon-cart {
	background: ${branding_accent_dark};
	}
	.main-navigation .shopping-cart:hover .shopping-cart-count {
	background: ${branding_accent_dark} padding-box;
	}
	.main-navigation .shopping-cart .shopping-cart-count {
	background: ${branding_accent} padding-box;
	}
	.widget_shopping_cart .widget_shopping_cart_content .cart_list .mini_cart_item .mini_cart_details .mini_cart_product {
	color: ${fonts_text_dark};
	}
	.widget_shopping_cart .widget_shopping_cart_content .cart_list .mini_cart_item .mini_cart_details .mini_cart_cost {
	color: ${branding_accent};
	}
	.widget_shopping_cart .widget_shopping_cart_content .cart_list .mini_cart_item .remove:hover {
	color: ${branding_accent_dark} !important;
	}
	.widget_shopping_cart .widget_shopping_cart_content .buttons a {
	.font( ${fonts_headings} );
	}
	.widget_shopping_cart .widget_shopping_cart_content .buttons a.mini_cart_view {
	border: 1px solid ${fonts_text_dark};
	color: ${fonts_text_dark};
	}
	.widget_shopping_cart .widget_shopping_cart_content .buttons a.mini_cart_checkout {
	background: ${branding_accent};
	border: 1px solid ${branding_accent};
	}
	.widget_shopping_cart .widget_shopping_cart_content .buttons a:hover {
	background: ${branding_accent_dark};
	border-color: ${branding_accent_dark};
	}
	.woocommerce form.login .button {
	.font( ${fonts_headings} );
	background: ${branding_accent};
	border: 1px solid ${branding_accent};
	}
	.woocommerce form.login .button:hover {
	background: ${branding_accent_dark};
	border-color: ${branding_accent_dark};
	}
	.woocommerce form.checkout_coupon .button {
	.font( ${fonts_headings} );
	border: 1px solid ${fonts_text_dark};
	color: ${fonts_text_dark};
	}
	.woocommerce form.checkout_coupon .button:hover {
	background: ${branding_accent_dark};
	border-color: ${branding_accent_dark};
	}
	.woocommerce form.woocommerce-checkout .order-details table.shop_table .product-total .amount {
	color: ${branding_accent};
	}
	.woocommerce form.woocommerce-checkout .order-details table.shop_table .cart-subtotal td .amount {
	color: ${branding_accent};
	}
	.woocommerce form.woocommerce-checkout .order-details table.shop_table .order-total td .amount {
	color: ${branding_accent};
	}
	.woocommerce form.woocommerce-checkout .order-details #payment input.button {
	.font( ${fonts_headings} );
	background: ${branding_accent};
	border: 1px solid ${branding_accent};
	}
	.woocommerce form.woocommerce-checkout .order-details #payment input.button:hover {
	background: ${branding_accent_dark};
	border-color: ${branding_accent_dark};
	}
	.widget_price_filter .ui-slider {
	background-color: ${branding_accent};
	}
	.widget_price_filter .ui-slider .ui-slider-range,.widget_price_filter .ui-slider .ui-slider-handle {
	background-color: ${branding_accent_dark};
	}
	.widget_price_filter .price_slider_amount .button {
	border: 1px solid ${fonts_text_dark};
	color: ${fonts_text_dark};
	}
	.widget_price_filter .price_slider_amount .button:hover {
	background: ${branding_accent_dark};
	border-color: ${branding_accent_dark};
	}
	.woocommerce .widget-area .widget_layered_nav ul li.chosen a {
	background: ${branding_accent};
	}
	.woocommerce .widget-area .widget_layered_nav ul li.chosen a:hover {
	background: ${branding_accent_dark};
	}
	.woocommerce .widget-area .widget_layered_nav_filters ul li.chosen a {
	background: ${branding_accent};
	}
	.woocommerce .widget-area .widget_layered_nav_filters ul li.chosen a:hover {
	background: ${branding_accent_dark};
	}
	.woocommerce #quick-view-container .product-content-wrapper .product-info-wrapper .price {
	color: ${branding_accent};
	.font( ${fonts_details} );
	}
	#topbar .demo_store {
	background: ${branding_accent};
	color: ${fonts_text_meta};
	.font( ${fonts_details} );
	}';
	return $css;
}
add_filter( 'siteorigin_settings_custom_css', 'siteorigin_north_wc_settings_custom_css' );

/**
 * Add CSS for mobile menu breakpoint
 */
function siteorigin_north_menu_breakpoint_css( $css, $settings ) {
	$breakpoint = isset( $settings['theme_settings_responsive_menu_breakpoint'] ) ? $settings['theme_settings_responsive_menu_breakpoint'] : 600;

	$css .= '@media screen and (max-width: ' . intval( $breakpoint ) . 'px) {
		body.responsive .main-navigation #mobile-menu-button {
			display: inline-block;
		}
		body.responsive .main-navigation ul {
			display: none;
		}
		body.responsive .main-navigation .north-search-icon {
			display: none;
		}
		.main-navigation #mobile-menu-button {
			display: none;
		}
		.main-navigation ul {
			display: inline-block;
		}
		.main-navigation .north-search-icon {
			display: inline-block;
		}
	}
	@media screen and (min-width: ' . ( 1 + $breakpoint ) . 'px) {
		body.responsive #mobile-navigation {
			display: none !important;
		}
	}';
	return $css;
}
add_filter( 'siteorigin_settings_custom_css', 'siteorigin_north_menu_breakpoint_css', 10, 2 );

/**
 * Add CSS when sidebar width is 0.
 */
function siteorigin_north_sidebar_zero_css( $css, $settings ) {
	if ( ! isset( $settings[ 'theme_settings_structure_sidebar_width' ] ) ) {
		return $css;
	}

	$sidebar_width = $settings['theme_settings_structure_sidebar_width'];

	if ( $sidebar_width == 0 ) {

		$css .= '.site-content .widget-area {
			display: none;
		}';

	}

	return $css;

}
add_filter( 'siteorigin_settings_custom_css', 'siteorigin_north_sidebar_zero_css', 10, 2 );

/**
 * Add default settings.
 *
 * @param $defaults
 *
 * @return mixed
 */
function siteorigin_north_settings_defaults( $defaults ) {
	// Branding defaults.
	$defaults['branding_logo']             = false;
	$defaults['branding_logo_retina']      = false;
	$defaults['branding_site_title']       = false;
	$defaults['branding_site_description'] = true;
	$defaults['branding_attribution']      = false;
	$defaults['branding_accent']           = '#c75d5d';
	$defaults['branding_accent_dark']      = '#a94346';

	// Font defaults.
	$defaults['fonts_text_dark']       	 = '#292929';
	$defaults['fonts_text_medium']     	 = '#595959';
	$defaults['fonts_text_light']      	 = '#898989';
	$defaults['fonts_text_meta']       	 = '#b0b0b0';

	// The new menu font colors.
	$defaults['fonts_text_menu']         = '#898989';
	$defaults['fonts_text_menu_hover']   = '#595959';
	$defaults['fonts_text_menu_current'] = '#292929';

	// Icon defaults.
	$defaults['icons_menu']          = false;
	$defaults['icons_search']        = false;
	$defaults['icons_close_search']  = false;
	$defaults['icons_scroll_to_top'] = false;

	// Double % because values are passed through get_theme_mod so must be escaped for sprintf.
	$defaults['structure_sidebar_width']    = '35%%';
	$defaults['structure_sidebar_position'] = 'right';

	// The masthead defaults.
	$defaults['masthead_layout']               = 'default';
	$defaults['masthead_text_above']           = '';
	$defaults['masthead_background_color']     = '#fafafa';
	$defaults['masthead_top_background_color'] = '#f4f4f4';
	$defaults['masthead_border_color']         = '#d4d4d4';
	$defaults['masthead_border_width']         = '1px';
	$defaults['masthead_padding']              = '30px';
	$defaults['masthead_top_padding']          = '10px';
	$defaults['masthead_bottom_margin']        = '30px';

	// Navigation settings.
	$defaults['navigation_search']               = true;
	$defaults['navigation_sticky']               = true;
	$defaults['navigation_sticky_scale']         = true;
	$defaults['navigation_post']                 = true;
	$defaults['navigation_scroll_to_top']        = true;
	$defaults['navigation_scroll_to_top_mobile'] = false;
	$defaults['navigation_smooth_scroll']        = true;

	// Responsive settings.
	$defaults['responsive_disabled']                       = false;
	$defaults['responsive_fitvids']                        = true;
	$defaults['responsive_menu_breakpoint']                = '600';
	$defaults['responsive_menu_text']                      = __( 'Menu', 'siteorigin-north' );
	$defaults['responsive_mobile_menu_background_color']   = '#000';
	$defaults['responsive_mobile_menu_background_opacity'] = '0.9';
	$defaults['responsive_mobile_menu_text_color']         = '#fff';
	$defaults['responsive_mobile_text_color']              = '#666';
	$defaults['responsive_mobile_icon_color']              = '#777';

	// Blog settings.
	$defaults['blog_featured_archive']      = true;
	$defaults['blog_post_content']          = 'content';
	$defaults['blog_read_more_text']        = __( 'Continue reading', 'siteorigin-north' );
	$defaults['blog_excerpt_length']        = 55;
	$defaults['blog_excerpt_post_link']     = true;
	$defaults['blog_featured_single']       = true;
	$defaults['blog_display_author_box']    = false;
	$defaults['blog_display_date']          = true;
	$defaults['blog_display_author']        = true;
	$defaults['blog_display_comment_count'] = true;
	$defaults['blog_ajax_comments']         = true;

	// Footer defaults.
	$defaults['footer_text']             	= __( 'Copyright &copy; {year} {sitename}', 'siteorigin-north' );
	$defaults['footer_widget_title_color']	= '#292929';
	$defaults['footer_text_color']       	= '#595959';
	$defaults['footer_link_color']       	= '#c75d5d';
	$defaults['footer_link_hover_color']    = '#a94346';
	$defaults['footer_constrained']      	= false;
	$defaults['footer_background_color'] 	= '#fafafa';
	$defaults['footer_border_color']     	= '#d4d4d4';
	$defaults['footer_border_width']     	= '1px';
	$defaults['footer_top_padding']      	= '40px';
	$defaults['footer_side_padding']     	= '40px';
	$defaults['footer_top_margin']       	= '30px';

	// WooCommerce defaults.
	$defaults['woocommerce_archive_columns']		= 3;
	$defaults['woocommerce_display_cart']			= true;
	$defaults['woocommerce_display_checkout_cart']	= false;
	$defaults['woocommerce_display_quick_view']		= false;
	$defaults['woocommerce_sidebar_position']		= 'right';

	return $defaults;
}
add_filter( 'siteorigin_settings_defaults', 'siteorigin_north_settings_defaults' );

function siteorigin_north__migrated_settings( $migrated ) {
	$migrated = array(
		'fonts_text_menu' => 'fonts_text_light',
		'fonts_text_menu_hover' => 'fonts_text_medium',
		'fonts_text_menu_current' => 'fonts_text_dark',
	);
	return $migrated;
}
add_filter( 'siteorigin_settings_migrated_settings', 'siteorigin_north__migrated_settings' );

/**
 * Setup Page Settings for SiteOrigin North
 */
function siteorigin_north_page_settings( $settings, $type, $id ){

	$settings['layout'] = array(
		'type'    => 'select',
		'label'   => __( 'Page Layout', 'siteorigin-north' ),
		'options' => array(
			'default'				=> __( 'Default', 'siteorigin-north' ),
			'no-sidebar'         	=> __( 'No Sidebar', 'siteorigin-north' ),
			'full-width'         	=> __( 'Full Width', 'siteorigin-north' ),
			'full-width-sidebar' 	=> __( 'Full Width, With Sidebar', 'siteorigin-north' ),
			'stripped' 			 	=> __( 'Stripped', 'siteorigin-north' ),
		),
	);

	$settings['menu'] = array(
		'type'    => 'select',
		'label'   => __( 'Menu Position', 'siteorigin-north' ),
		'options' => array(
			'default' => __( 'Default', 'siteorigin-north' ),
			'overlap' => __( 'Overlaps Content', 'siteorigin-north' ),
		),
	);

	$settings['page_title'] = array(
		'type'           => 'checkbox',
		'label'          => __( 'Page Title', 'siteorigin-north' ),
		'checkbox_label' => __( 'display', 'siteorigin-north' ),
		'description'    => __( 'Display the page title on this page.', 'siteorigin-north' )
	);

	if ( $type == 'post' ) $post = get_post( $id );
	if ( ! empty( $post ) && $post->post_type == 'page' ) {
		$settings['featured_image'] = array(
			'type'           => 'checkbox',
			'label'          => __( 'Page Featured Image', 'siteorigin-north' ),
			'checkbox_label' => __( 'display', 'siteorigin-north' ),
			'description'    => __( 'Display the page featured image on this page.', 'siteorigin-north' )
		);
	}

	$settings['masthead_margin'] = array(
		'type'           => 'checkbox',
		'label'          => __( 'Masthead Bottom Margin', 'siteorigin-north' ),
		'checkbox_label' => __( 'enable', 'siteorigin-north' ),
		'description'    => __( 'Include the margin below the masthead (top area) of your site.', 'siteorigin-north' )
	);

	$settings['footer_margin'] = array(
		'type'           => 'checkbox',
		'label'          => __( 'Footer Top Margin', 'siteorigin-north' ),
		'checkbox_label' => __( 'enable', 'siteorigin-north' ),
		'description'    => __( 'Include the margin above your footer.', 'siteorigin-north' )
	);

	$settings['hide_masthead'] = array(
		'type'           => 'checkbox',
		'label'          => __( 'Hide Masthead', 'siteorigin-north' ),
		'checkbox_label' => __( 'hide', 'siteorigin-north' ),
		'description'    => __( 'Hide the masthead on this page.', 'siteorigin-north' )
	);

	$settings['hide_footer_widgets'] = array(
		'type'           => 'checkbox',
		'label'          => __( 'Hide Footer Widgets', 'siteorigin-north' ),
		'checkbox_label' => __( 'hide', 'siteorigin-north' ),
		'description'    => __( 'Hide the footer widgets on this page.', 'siteorigin-north' )
	);

	return $settings;
}
add_action( 'siteorigin_page_settings', 'siteorigin_north_page_settings', 10, 3 );

/**
 * Add the default Page Settings.
 */
function siteorigin_north_setup_page_setting_defaults( $defaults, $type, $id ) {
	// All the basic default settings
	$defaults['layout']              = 'default';
	$defaults['menu']                = 'default';
	$defaults['page_title']          = true;
	$defaults['masthead_margin']     = true;
	$defaults['footer_margin']       = true;
	$defaults['hide_masthead']       = false;
	$defaults['hide_footer_widgets'] = false;

	// Defaults for page only settings.
	if( $type == 'post' ) $post = get_post( $id );
	if( ! empty( $post ) && $post->post_type == 'page' ) {
		$defaults['featured_image'] = false;
	}

	// Specific default settings for different types.
	if( $type == 'template' && $id == 'home' ) {
		$defaults['page_title'] = false;
	}

	return $defaults;
}
add_filter( 'siteorigin_page_settings_defaults', 'siteorigin_north_setup_page_setting_defaults', 10, 3 );

/**
 * Change the default page settings for the home page.
 *
 * @param $settings
 *
 * @return mixed
 */
function siteorigin_north_page_settings_panels_defaults( $settings ) {
	$settings['layout'] = 'no-sidebar';
	$settings['page_title'] = false;

	return $settings;
}
add_filter( 'siteorigin_page_settings_panels_home_defaults', 'siteorigin_north_page_settings_panels_defaults' );

/**
 * Convert URL based images into IDs
 *
 * @param $mods
 *
 * @return mixed
 */
function siteorigin_north_siteorigin_setting_update_image( $mods ) {
	foreach ( array( 'branding_logo', 'branding_retina_logo' ) as $key ) {
		if( ! empty( $mods[ 'theme_settings_' . $key ] ) && ! is_numeric( $mods[ 'theme_settings_' . $key ] ) ) {
			$mods[ 'theme_settings_' . $key ] = SiteOrigin_Settings::get_image_id( $mods[ 'theme_settings_' . $key ] );
		}
	}

	return $mods;
}
add_filter( 'option_theme_mods_siteorigin-north', 'siteorigin_north_siteorigin_setting_update_image' );

/**
 * Adds everything we need for the North about page.
 */
function siteorigin_north_about_page( $about ) {
	$about['title_image'] = get_template_directory_uri() . '/admin/about/north-logo-small.png';
	$about['title_image_2x'] = get_template_directory_uri() . '/admin/about/north-logo-large.png';

	$about['video_thumbnail'] = array(
		get_template_directory_uri() . '/admin/about/video-1.jpg',
		get_template_directory_uri() . '/admin/about/video-2.jpg',
		get_template_directory_uri() . '/admin/about/video-3.jpg',
	);

	$about['documentation_url'] = 'https://siteorigin.com/north-documentation/';
	$about['review'] = true;

	$about['description'] = __( 'SiteOrigin North is a simple, customizable WordPress theme. Check out this video to get an idea of what it has to offer.', 'siteorigin-north' );

	$about['sections'] = array(
		'free',
		'customize',
		'page-builder',
		'support',
		'github',
	);

	return $about;
}
add_filter( 'siteorigin_about_page', 'siteorigin_north_about_page' );
