<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="product_meta pt-3 border-t border-200">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
		<div>
			<span class="sku_wrapper text-xs md:text-sm text-grey font-bold"><?php esc_html_e( 'SKU', 'woocommerce' ); ?> <span class="sku text-xs md:text-sm text-grey font-acumin font-normal"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>
		</div>
	<?php endif; ?>

	<?php

	$attributes = $product->get_meta_data();
	$categories = wc_get_product_category_list( $product->get_id(), ', ' );
	if ( $categories ) {
		echo '<div class="product-categories text-xs md:text-sm text-grey font-acumin"><strong class="text-xs md:text-sm text-grey font-bold">Categories</strong> ' . wp_kses_post( $categories ) . '</div>';
	} ?>

	<?php
		echo wc_get_product_tag_list(
			$product->get_id(),
			', ',
			'<div class="tagged_as text-xs md:text-sm text-grey font-acumin"><strong class="text-xs md:text-sm text-grey font-bold">' . _n( 'Tag', 'Tag:', count( $product->get_tag_ids() ), 'woocommerce' ) . '</strong> ',
			'</div>'
		);
	?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
