<?php

// An array mapping SCSS variable to a SiteOrigin Settings variable name
return array(
	'variables' => array(
		// The fonts
		'font__main' => 'fonts_main',
		'font__headings' => 'fonts_headings',
		'font__blockquote' => 'fonts_details',

		// The page structure
		'size__site-sidebar' => 'structure_sidebar_width',

		// The accent colors used in free
		'color__primary_accent' => 'branding_accent',
		'color__primary_accent_dark' => 'branding_accent_dark',

		// The text colors
		'color__text_dark' => 'fonts_text_dark',
		'color__text_medium' => 'fonts_text_medium',
		'color__text_light' => 'fonts_text_light',
		'color__text_meta' => 'fonts_text_meta',

		// The header customizations
		'masthead__background_color' => 'masthead_background_color',
		'masthead__top_background_color' => 'masthead_top_background_color',
		'masthead__border_color' => 'masthead_border_color',
		'masthead__border_width' => 'masthead_border_width',
		'masthead__padding' => 'masthead_padding',
		'masthead__bottom_margin' => 'masthead_bottom_margin',

		// The footer customizations
		'footer__background_color' => 'footer_background_color',
		'footer__border_color' => 'footer_border_color',
		'footer__border_width' => 'footer_border_width',
		'footer__top_padding' => 'footer_top_padding',
		'footer__side_padding' => 'footer_side_padding',
		'footer__top_margin' => 'footer_top_margin',

	),
	'free' => array(
		// SASS variables that are available in the free version.
		'color__primary_accent',
		'color__primary_accent_dark',
		'size__site-sidebar'
	),
	'stylesheets' => array(
		'style',
		'woocommerce'
	),
);