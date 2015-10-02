<?php

// An array mapping SCSS variable to a SiteOrigin Settings variable name
return array(
	'variables' => array(
		// The fonts
		'font__main' => 'fonts_main',
		'font__headings' => 'fonts_headings',
		'font__blockquote' => 'fonts_details',

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

	),
	'free' => array(
		// SASS variables that are available in the free version.
		'color__primary_accent',
		'color__primary_accent_dark',
	),
	'stylesheets' => array(
		'style',
		'woocommerce'
	),
);