<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package siteorigin-north
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'siteorigin-north' ); ?></a>

	<?php if( siteorigin_setting('masthead_text_above') ) : ?>
		<div id="topbar">
			<div class="container">
				<p><?php echo wp_kses_post( siteorigin_setting('masthead_text_above') ) ?></p>
			</div>
		</div>
	<?php endif; ?>

	<header id="masthead" class="site-header layout-<?php echo str_replace('_', '-', siteorigin_setting( 'masthead_layout' ) ) ?> <?php if( siteorigin_setting('navigation_sticky') ) echo 'sticky-menu'; ?>" role="banner"
		<?php if( siteorigin_setting( 'navigation_sticky_scale' ) ) echo 'data-scale-logo="true"' ?> >
		<div class="container">

			<div class="container-inner">
				<div class="site-branding">
					<?php siteorigin_north_display_logo() ?>
					<?php if( siteorigin_setting('branding_site_description') ) : ?>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php endif ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">

					<a href="#menu" id="mobile-menu-button">
						<?php siteorigin_north_display_icon('menu') ?>
						<?php echo esc_html( siteorigin_setting('responsive_menu_text') ) ?>
					</a>

					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id' => 'primary-menu'
					) );
					?>

					<?php if( siteorigin_setting('navigation_search') ) : ?>
						<span class="north-icon-search"></span>
					<?php endif; ?>

				</nav><!-- #site-navigation -->
			</div>

		</div>

		<?php if( siteorigin_setting('navigation_search') ) : ?>
			<div id="header-search">
				<div class="container">
					<form method="get" action="<?php echo esc_url( site_url() ) ?>">
						<input type="search" name="s" placeholder="<?php esc_attr_e('Search', 'siteorigin-north') ?>" value="<?php echo get_search_query() ?>" />
						<input type="submit" value="<?php _e('Search', 'siteorigin-north') ?>" />
					</form>
					<?php siteorigin_north_display_icon('close'); ?>
				</div>
			</div>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="container">
