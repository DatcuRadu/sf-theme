<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>
	<section class="bg-gradient-to-b from-[#FDFCFC] to-[#FFFFFF] py-5">
		<div class="max-w-8xl mx-auto">
			<div class="flex flex-wrap lg:flex-nowrap">
				<div class="p-5 w-full lg:w-3/5">
					<?php $product_extras_features_enclosed_trailers = do_shortcode('[wpv-post-body view_template="features-enclosed-trailers"]'); ?>
					<?php if ( ! empty( trim( $product_extras_features_enclosed_trailers ) ) ) : ?>
						<div class="single-product-extras">
							<?php echo $product_extras_features_enclosed_trailers; ?>
						</div>
					<?php endif; ?>

					<div class="sf-woocommerce-tabs woocommerce-tabs wc-tabs-wrapper">
						<ul class="tabs wc-tabs flex gap-1" role="tablist">
							<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
								<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
									<a href="#tab-<?php echo esc_attr( $key ); ?>">
										<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
							<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab w-full" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
								<?php
								if ( isset( $product_tab['callback'] ) ) {
									call_user_func( $product_tab['callback'], $key, $product_tab );
								}
								?>
							</div>
						<?php endforeach; ?>

						<?php $product_extras_jsvs_only = do_shortcode('[wpv-post-body view_template="product-extras-template-jsvs-only"]'); ?>
						<?php if ( ! empty( trim( $product_extras_jsvs_only ) ) ) : ?>
							<div class="single-product-extras">
								<?php echo $product_extras_jsvs_only; ?>
							</div>
						<?php endif; ?>

						<?php do_action( 'woocommerce_product_after_tabs' ); ?>
					</div>
				</div>
				<div class="p-5 w-full lg:w-2/5">
					<?php
					$product_extras_chainsaw_bars_content = do_shortcode('[wpv-post-body view_template="product-extras-template-chainsaw-bars"]');
					$product_extras_tractors_content = do_shortcode('[wpv-post-body view_template="product-extras-template-tractors"]');
					$product_extras_enclosed_trailers_only_content = do_shortcode('[wpv-post-body view_template="product-extras-template-enclosed-trailers-only"]');
					$product_extras_content = do_shortcode('[wpv-post-body view_template="product-extras-template"]');
					$product_extras_track_loader_content = do_shortcode('[wpv-post-body view_template="product-extras-template-track-loader"]');
					$product_extras_almost_all_trailers_content = do_shortcode('[wpv-post-body view_template="product-extras-almost-all-trailers"]');
					$product_accessories_content = do_shortcode('[wpv-post-body view_template="product-accessories-template"]');
					$product_accessories_chainsaws_content = do_shortcode('[wpv-post-body view_template="product-accessories-template-chainsaws"]');
					$product_accessories_trailers_content = do_shortcode('[wpv-post-body view_template="product-accessories-template-trailers"]');
					$product_accessories_utv_content = do_shortcode('[wpv-post-body view_template="product-accessories-template-utv"]');
					?>
					<?php if ( ! empty( trim( $product_extras_chainsaw_bars_content ) ) ) : ?>
						<div class="single-product-extras">
							<?php echo $product_extras_chainsaw_bars_content; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( trim( $product_extras_tractors_content ) ) ) : ?>
						<div class="single-product-extras">
							<?php echo $product_extras_tractors_content; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( trim( $product_extras_enclosed_trailers_only_content ) ) ) : ?>
						<div class="single-product-extras">
							<?php echo $product_extras_enclosed_trailers_only_content; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( trim( $product_extras_content ) ) ) : ?>
						<div class="single-product-extras">
							<?php echo $product_extras_content; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( trim( $product_extras_track_loader_content ) ) ) : ?>
						<div class="single-product-extras">
							<?php echo $product_extras_track_loader_content; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( trim( $product_extras_almost_all_trailers_content ) ) ) : ?>
						<div class="single-product-extras">
							<?php echo $product_extras_almost_all_trailers_content; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( trim( $product_accessories_content ) ) ) : ?>
						<div class="single-product-extras">
							<?php echo $product_accessories_content; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( trim( $product_accessories_chainsaws_content ) ) ) : ?>
						<div class="single-product-extras">
							<?php echo $product_accessories_chainsaws_content; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( trim( $product_accessories_trailers_content ) ) ) : ?>
						<div class="single-product-extras">
							<?php echo $product_accessories_trailers_content; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( trim( $product_accessories_utv_content ) ) ) : ?>
						<div class="single-product-extras">
							<?php echo $product_accessories_utv_content; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>
