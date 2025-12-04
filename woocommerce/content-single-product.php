<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>"  <?php wc_product_class( 'sf-single-product', $product ); ?>>

    <div class="max-w-8xl mx-auto flex mb-4">
        <?php 
        woocommerce_breadcrumb([
            'delimiter'   => ' / ',
            'wrap_before' => '<nav class="sf-breadcrumb p-2.5 w-full" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
        ]); ?>
    </div>

    <div class="max-w-8xl mx-auto flex flex-wrap lg:mb-12">
        
        <div class="w-full md:w-[53%] p-5 xl:pl-36">
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action( 'woocommerce_before_single_product_summary' );
        ?>
        </div>

        <div class="w-full md:w-[47%] p-5">
            <div class="summary entry-summary">
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                do_action( 'woocommerce_single_product_summary' );

                // woocommerce_template_single_title();     // 5
                // woocommerce_template_single_rating();    // 10
                // woocommerce_template_single_price();     // 10
                // woocommerce_template_single_excerpt();   // 20
                // woocommerce_template_single_add_to_cart(); // 30
                // woocommerce_template_single_meta();      // 40
                // woocommerce_template_single_sharing();    // 50
                // WC_Structured_Data::generate_product_data(); // 60
                //                 [map_price]
                // [smessages type="Shipping"]

                // [smessages type="Noshipping"]
                // [discontinued]

                //  [wpv-post-body view_template="product-extras-template-chainsaw-bars"]

                // echo do_shortcode('[smessages type="Shipping"]');
                // echo do_shortcode('[smessages type="Noshipping"]');
                //echo do_shortcode('[discontinued]');
                // echo do_shortcode('[wpv-post-body view_template="product-extras-template-chainsaw-bars"]');
                ?>
            </div>

            <div class="mt-10">
                <a href="/delivery/" class="flex items-center gap-3.5 font-acumin text-sm md:text-base text-grey hover:text-grey-700 pr-[50px]">
                    <i aria-hidden="true" class="fas fa-truck-loading text-3xl"></i>
                    <span class="elementor-icon-list-text"><b>We deliver!</b> Please see our delivery calculator to get a price quote to have a Safford team member bring your equipment to you.</span>
                </a>
            </div>
        </div>

    </div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
