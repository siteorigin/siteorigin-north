<?php
/**
 * Single Product Meta
 *
 * @see         http://docs.woothemes.com/document/template-structure/
 *
 * @author      WooThemes
 *
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>

<?php

if ( ( class_exists( 'SiteOrigin_Premium' ) ) && ( class_exists( 'SiteOrigin_Premium_Plugin_WooCommerce_Templates' ) ) ) { ?>

<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) { ?>

		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'siteorigin-north' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'siteorigin-north' ); ?></span></span>

	<?php } ?>

	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'siteorigin-north' ) . ' ', '</span>' ); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'siteorigin-north' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>

<?php } else { ?>

<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( function_exists( 'wc_get_product_tag_list' ) ) { ?>
		<?php echo wc_get_product_tag_list( $product->get_id(), '', '<div class="tags-list">', '</div>' ); ?>
	<?php } ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>

<?php } ?>
