<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package siteorigin-north
 * @license GPL 2.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'siteorigin-north' ); ?></a>

	<?php if ( siteorigin_setting( 'masthead_text_above' ) && ! is_active_sidebar( 'topbar-sidebar' ) ) : ?>
		<div id="topbar">
			<?php if ( class_exists( 'Woocommerce' ) && is_store_notice_showing() ) {
				siteorigin_north_wc_demo_store();
			} ?>
			<div class="container">
				<p><?php echo wp_kses_post( siteorigin_setting( 'masthead_text_above' ) ) ?></p>
			</div>
		</div><!-- #topbar -->
	<?php elseif ( is_active_sidebar( 'topbar-sidebar' ) ) : ?>
		<div id="topbar">
			<?php if ( class_exists( 'Woocommerce' ) && is_store_notice_showing() ) {
				siteorigin_north_wc_demo_store();
			} ?>
			<div id="topbar-widgets" class="container">
				<?php $siteorigin_north_masthead_sidebar = wp_get_sidebars_widgets(); ?>
				<div class="widgets widgets-<?php echo count( $siteorigin_north_masthead_sidebar['topbar-sidebar'] ) ?>" aria-label="<?php esc_attr_e( 'Top Bar Sidebar', 'siteorigin-north' ); ?>">
					<?php dynamic_sidebar( 'topbar-sidebar' ); ?>
				</div>
			</div><!-- #topbar-widgets -->
		</div><!-- #topbar -->
	<?php elseif ( class_exists( 'Woocommerce' ) && is_store_notice_showing() ) : ?>
		<div id="topbar">
			<?php siteorigin_north_wc_demo_store(); ?>
		</div><!-- #topbar -->
	<?php endif; ?>

	<?php if ( ! siteorigin_page_setting( 'hide_masthead', false ) ) : ?>
		<header id="masthead" class="site-header layout-<?php echo sanitize_html_class( str_replace('_', '-', siteorigin_setting( 'masthead_layout' ) ) ) ?> <?php if( siteorigin_setting( 'navigation_sticky' ) ) echo 'sticky-menu'; ?>" <?php if ( siteorigin_setting( 'navigation_sticky_scale' ) ) echo 'data-scale-logo="true"' ?> >
			<div class="container">

				<div class="container-inner">

					<div class="site-branding">
						<?php siteorigin_north_display_logo(); ?>
						<?php if ( siteorigin_setting( 'branding_site_description' ) ) : ?>
							<p class="site-description"><?php bloginfo( 'description' ); ?></p>
						<?php endif ?>
					</div><!-- .site-branding -->

					<nav id="site-navigation" class="main-navigation">

						<?php if ( siteorigin_page_setting( 'layout' ) !== 'stripped' ) : ?>

							<?php if ( function_exists( 'ubermenu' ) ) : ?>

								<?php
								ubermenu(
									'main',
									array( 'theme_location' => 'primary' )
								);
								?>

							<?php elseif ( function_exists( 'max_mega_menu_is_enabled' ) && max_mega_menu_is_enabled( 'primary' ) ) : ?>

								<?php
								wp_nav_menu( array(
									'theme_location' => 'primary'
								) );
								?>

							<?php else : ?>

								<a href="#menu" id="mobile-menu-button">
									<?php siteorigin_north_display_icon( 'menu' ) ?>
									<?php if ( siteorigin_setting( 'responsive_menu_text' ) ) : ?>
										<?php echo esc_html( siteorigin_setting( 'responsive_menu_text' ) ); ?>
										<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'siteorigin-north' ); ?></span>
									<?php endif; ?>
								</a>

								<?php
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_id' => 'primary-menu'
								) );
								?>

							<?php endif; ?>

							<?php if ( class_exists( 'Woocommerce' ) && ! ( function_exists( 'ubermenu' ) || function_exists( 'max_mega_menu_is_enabled' ) ) ) : ?>
								<?php if ( ( ! ( is_cart() || is_checkout() ) && siteorigin_setting( 'woocommerce_display_cart' ) ) || ( ( is_cart() || is_checkout() ) && siteorigin_setting( 'woocommerce_display_checkout_cart' ) ) ) : ?>
									<?php global $woocommerce; ?>
									<ul class="shopping-cart">
										<li>
											<a class="shopping-cart-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
												<span class="screen-reader-text"><?php esc_html_e( 'View shopping cart', 'siteorigin-north' ); ?></span>
												<span class="north-icon-cart"></span>
												<span class="shopping-cart-text"><?php esc_html_e( ' View Cart ', 'siteorigin-north' ); ?></span>
												<span class="shopping-cart-count"><?php echo WC()->cart->cart_contents_count;?></span>
											</a>
											<ul class="shopping-cart-dropdown" id="cart-drop">
												<?php the_widget( 'WC_Widget_Cart' ); ?>
											</ul>
										</li>
									</ul>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( siteorigin_setting( 'navigation_search' ) && ! ( function_exists( 'ubermenu' ) || function_exists( 'max_mega_menu_is_enabled' ) ) ) : ?>
								<button class="north-search-icon">
									<label class="screen-reader-text"><?php esc_html_e( 'Open search bar', 'siteorigin-north' ); ?></label>
									<?php siteorigin_north_display_icon( 'search' ); ?>
								</button>
							<?php endif; ?>

						<?php endif; ?>

						<?php if ( siteorigin_page_setting( 'layout' ) == 'stripped' ) : ?>
							<ul>
								<li>
									<a href="" class="stripped-backlink" onclick="window.history.go( -1 ); return false;">
										<?php esc_html_e( 'Go back', 'siteorigin-north' ); ?>
									</a>
								</li>
							</ul>
						<?php endif; ?>

					</nav><!-- #site-navigation -->

				</div><!-- .container-inner -->

			</div><!-- .container -->

			<?php if ( siteorigin_setting( 'navigation_search' ) ) : ?>
				<div id="header-search">
					<div class="container">
						<label for='s' class='screen-reader-text'><?php esc_html_e( 'Search for:', 'siteorigin-north' ); ?></label>
						<?php get_search_form(); ?>
						<a id="close-search">
							<span class="screen-reader-text"><?php esc_html_e( 'Close search bar', 'siteorigin-north' ); ?></span>
							<?php siteorigin_north_display_icon( 'close' ); ?>
						</a>
					</div>
				</div>
			<?php endif; ?>
		</header><!-- #masthead -->
	<?php endif; ?>

	<?php do_action( 'siteorigin_north_content_before' ); ?>

	<div id="content" class="site-content">

		<div class="container">

			<?php do_action( 'siteorigin_north_content_top' ); ?>
