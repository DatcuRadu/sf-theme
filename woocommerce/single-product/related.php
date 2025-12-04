<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	global $product;

	if ( ! $product ) return;

	if ( class_exists('WC_Product_Bundle') && $product->is_type('bundle') ) {

		$bundled_items = $product->get_bundled_items();

		if ( ! empty( $bundled_items ) ) : ?>
			<section class="sf-bundle-products max-w-8xl mx-auto p-2.5">
				<h2 class="text-4xl font-acumin-wide text-grey mb-5 text-center font-semibold"><?php esc_html_e( 'Products in this Bundle', 'woocommerce' ); ?></h2>
				<div class="flex-col items-start md:flex-row flex-wrap flex justify-between">
					<?php foreach ( $bundled_items as $bundled_item ) :
						$bundled_product = $bundled_item->get_product();
						if ( $bundled_product && $bundled_product->is_visible() ) : ?>
							<div class="flex flex-col w-full md:w-3/12  text-left p-[30px] md:p-5 lg:p-[30px]">
								<?php echo $bundled_product->get_image(); ?>
								<a href="<?php echo esc_url( get_permalink( $bundled_product->get_id() ) ); ?>" class="font-bold font-acumin pt-2.5 text-grey-700 text-lg leading-6">
									<?php echo esc_html( $bundled_product->get_name() ); ?>
								</a>
								<?php
								$attributes = $bundled_product->get_attributes();

								$mpn = '';
								if ( ! empty( $attributes ) ) {
									foreach ( $attributes as $attr ) {
										if ( $attr->get_name() === 'pa_mpn') {
											if ( $attr->is_taxonomy() ) {
												$terms = wp_get_post_terms( $bundled_product->get_id(), $attr->get_name(), array('fields' => 'names') );
												if ( ! empty($terms) ) $mpn = implode(', ', $terms);
											} else {
												$mpn = $attr->get_options();
												$mpn = implode(', ', $mpn);
											}
										}
									}
								}
								?>

								<?php if ( $mpn ) : ?>
									<p class="mb-0 font-acumin text-base text-grey-headline ">
										MPN: <?php echo esc_html( $mpn ); ?>
									</p>
								<?php endif; ?>

								<?php if ( $regular_price = $bundled_product->get_regular_price() ) : ?>
									<p class="mb-0 font-acumin text-base text-customDark">Regular price:<?php echo wc_price( $regular_price ); ?></p>
								<?php endif; ?>

								<?php $qty = $bundled_item->get_quantity(); ?>
								<?php if ( $qty ) : ?>
									<p class="mb-0 font-acumin text-base text-customDark pt-0.5">Qty: <?php echo esc_html( $qty ); ?></p>
								<?php endif; ?>
						</div>
						<?php endif;
					endforeach; ?>
				</div>
			</section>
		<?php endif;
	}?>