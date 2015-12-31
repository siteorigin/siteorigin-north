<?php
/**
 * SiteOrigin North functions and definitions
 *
 * @package siteorigin-north
 */

define('SITEORIGIN_THEME_VERSION', 'dev');
define('SITEORIGIN_THEME_JS_PREFIX', '');

// The settings manager
include get_template_directory() . '/inc/settings/settings.php';
include get_template_directory() . '/inc/settings/page-settings.php';

if ( ! function_exists( 'siteorigin_north_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function siteorigin_north_setup() {
	load_theme_textdomain( 'siteorigin-north', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 720, 380 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'siteorigin-north' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'siteorigin_north_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// This theme supports WooCommerce
	add_theme_support( 'woocommerce' );

	// Support for SiteOrigin Premium extras
	add_theme_support( 'siteorigin-premium-retina-images' );

	if( !defined('SITEORIGIN_PANELS_VERSION') ){
		// Only include panels lite if the panels plugin doesn't exist
		include get_template_directory() . '/inc/panels-lite/panels-lite.php';
	}

	add_theme_support( 'siteorigin-panels', array(
		'home-page' => true,
		'responsive' => !siteorigin_setting( 'responsive_disabled' ),
	) );
}
endif; // siteorigin_north_setup
add_action( 'after_setup_theme', 'siteorigin_north_setup' );

/**
 * Add support for premium theme components
 */
function siteorigin_north_premium_setup(){

	// This theme supports the no attribution addon
	add_theme_support( 'siteorigin-premium-no-attribution', array(
		'filter' => 'siteorigin_north_footer_credits',
		'enabled' => siteorigin_setting( 'branding_attribution' )
	) );
}
add_action( 'after_setup_theme', 'siteorigin_north_premium_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function siteorigin_north_content_width() {
	global $content_width;
	$content_width = apply_filters( 'siteorigin_north_content_width', 650 );
}
add_action( 'after_setup_theme', 'siteorigin_north_content_width', 0 );

/**
 * Disable responsive layout.
 */
function siteorigin_north_disable_responsive() {
	if ( siteorigin_setting( 'responsive_disabled' ) == false ) {
		echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
	}
}
add_action( 'wp_head', 'siteorigin_north_disable_responsive', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function siteorigin_north_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'siteorigin-north' ),
		'id'            => 'main-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'siteorigin-north' ),
		'id'            => 'footer-sidebar',
		'description'   => '',
		'before_widget' => '<div class="widget-wrapper"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'siteorigin_north_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function siteorigin_north_scripts() {
	wp_enqueue_style( 'siteorigin-north-style', get_stylesheet_uri() );
	wp_enqueue_style( 'siteorigin-north-icons', get_template_directory_uri() . '/css/north-icons.css' );

	wp_enqueue_script( 'siteorigin-north-transit', get_template_directory_uri() . '/js/jquery.transit' . SITEORIGIN_THEME_JS_PREFIX . '.js', array('jquery') );
	wp_enqueue_script( 'siteorigin-north-script', get_template_directory_uri() . '/js/north' . SITEORIGIN_THEME_JS_PREFIX . '.js', array('jquery') );

	if( siteorigin_setting('responsive_fitvids') ) {
		wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids' . SITEORIGIN_THEME_JS_PREFIX . '.js', array('jquery') );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'siteorigin_north_scripts' );

function siteorigin_north_siteorigin_premium($themes){
	$themes[] = 'siteorigin-north';
	return $themes;
}
add_filter('siteorigin_premium_themes', 'siteorigin_north_siteorigin_premium');

function siteorigin_north_filter_comment_form_default_fields( $fields ){
	$placeholders = apply_filters('siteorigin_north_comment_form_placeholders', array(
		'author' => __('Enter Your Name', 'siteorigin-north'),
		'email' => __('Enter Your Name', 'siteorigin-north'),
		'url' => __('Your Site URL', 'siteorigin-north'),
	) );

	if( isset($fields['author']) ) {
		$fields['author'] = str_replace(
			'<input id="author" ',
			'<input id="author" placeholder="' . esc_attr($placeholders['author']) . '" ',
			$fields['author']
		);
	}
	if( isset($fields['email']) ) {
		$fields['email'] = str_replace(
			'<input id="email" ',
			'<input id="email" placeholder="' . esc_attr($placeholders['email']) . '" ',
			$fields['email']
		);
	}
	if( isset($fields['url']) ) {
		$fields['url'] = str_replace(
			'<input id="url" ',
			'<input id="url" placeholder="' . esc_attr($placeholders['url']) . '" ',
			$fields['url']
		);
	}

	return $fields;
}
add_filter('comment_form_default_fields', 'siteorigin_north_filter_comment_form_default_fields');

function siteorigin_north_filter_comment_form_defaults( $defaults ){
	$comment_placeholder = __('Enter your message', 'siteorigin-north');
	if( !empty( $defaults['comment_field'] ) ) {
		$defaults['comment_field'] = str_replace(
			'<textarea id="comment" ',
			'<textarea id="comment" placeholder="' . esc_attr($comment_placeholder) . '" ',
			$defaults['comment_field']
		);
		$defaults['comment_field'] = '<div class="clear"></div>' . $defaults['comment_field'];
	}

	return $defaults;
}
add_filter('comment_form_defaults', 'siteorigin_north_filter_comment_form_defaults');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load the theme settings file
 */
require get_template_directory() . '/inc/settings.php';

/**
 * Support for SiteOrigin Page Builder
 */
require get_template_directory() . '/inc/siteorigin-panels.php';

/**
 * Load support for WooCommerce
 */

include get_template_directory() . '/woocommerce/functions.php';
