<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;
$cat_count = get_the_terms( $post->ID, 'product_cat' );
if ( $cat_count == false ){
    $cat_count = 0;
}
else{
    $cat_count = sizeof( $cat_count );
}
?>
<div class="product-under-title-meta">

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
		<div class="sku_wrapper"><?php _e( 'SKU:', 'siteorigin-north' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'siteorigin-north' ); ?></span></div>
	<?php endif; ?>

	<?php if ( function_exists( 'wc_get_product_category_list' ) ) : ?>
		<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<div class="cateogry">', '</div>' ); ?>
	<?php endif; ?>

</div>
