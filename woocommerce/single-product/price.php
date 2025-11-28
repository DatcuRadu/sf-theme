<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<p class="text-xl font-acumin text-grey-headline <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
	Our price:
	<strong class="text-grey-700"><?php echo $product->get_price_html(); ?></strong>
</p>
<?php if ( shortcode_exists( 'map_price' ) ): ?>
	<div class="-mt-6 mb-6"><?php echo do_shortcode('[map_price]'); ?></div>
<?php endif; ?>

