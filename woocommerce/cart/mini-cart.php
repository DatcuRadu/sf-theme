<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

    <ul class="p-0 m-0 divide-y divide-grey-450">
		<?php
		do_action( 'woocommerce_before_mini_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
				$thumbnail         =  wp_get_attachment_image_url( $_product->get_image_id(), 'full' );

				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

                $remove_link= apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    'woocommerce_cart_item_remove_link',
                    sprintf(
                        '<a href="%s" class="size-6 ml-0.5 flex-none flex justify-center items-center border border-orange text-orange rounded-full font-bold" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
                        esc_url(wc_get_cart_remove_url($cart_item_key)),
                        esc_attr__('Remove this item', 'woocommerce'),
                        esc_attr($product_id),
                        esc_attr($cart_item_key),
                        esc_attr($_product->get_sku())
                    ),
                    $cart_item_key
                );


                ?>
                <li class="flex items-center p-0" <?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)); ?>">
                <img src="<?php echo $thumbnail; ?>" alt="Product Image" class="w-16 h-16 object-contain object-center">
                <div class="ml-1.5 flex-1 py-2">
                    <div class="flex">
                        <a href="<?php echo esc_url($product_permalink); ?>"
                           class="text-blue font-bold font-acumin text-sm hover:text-grey-700"> <?php echo wp_kses_post($product_name); ?>
                        </a>
                        <?php echo $remove_link; ?>
                    </div>
                    <?php echo apply_filters('woocommerce_widget_cart_item_quantity', ' <p class="text-sm font-acumin font-normal text-grey">' . sprintf('%s &times; %s', $cart_item['quantity'], $product_price) . '</p>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </div>

                </li>
				<?php
			}
		}

		do_action( 'woocommerce_mini_cart_contents' );
		?>
	</ul>

	<p class="text-grey text-sm font-acumin font-normal">
		<?php
		/**
		 * Hook: woocommerce_widget_shopping_cart_total.
		 *
		 * @hooked woocommerce_widget_shopping_cart_subtotal - 10
		 */
		do_action( 'woocommerce_widget_shopping_cart_total' );
		?>
	</p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

    <a href="<?php echo wc_get_cart_url(); ?>" class="mt-7 inline-block w-full text-center bg-orange text-white text-sm py-2.5 rounded-[4px] font-acumin font-bold">
        View cart
    </a>

    <a href="<?php echo wc_get_checkout_url(); ?>" class="mt-7 inline-block w-full text-center bg-orange text-white text-sm py-2.5 rounded-[4px] font-acumin font-bold">
        Checkout
    </a>

	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
