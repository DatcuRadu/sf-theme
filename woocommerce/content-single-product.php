<?php
defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_single_product' ); ?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>

    <div class="mx-auto max-w-3xl">
    <?php woocommerce_breadcrumb(); ?>
    </div>
    <div class="mx-auto max-w-3xl">
        <div class="flex">
            <div class="w-full lg:w-6/12 p-5">
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * Output: Product gallery.
             */
            do_action( 'woocommerce_before_single_product_summary' );
            ?>
            </div>
            <div class="w-full lg:w-6/12 p-5">
                <div class="summary entry-summary">
                        <?php
                        /**
                         * Hook: woocommerce_single_product_summary.
                         *
                         * Output: title, rating, price, add to cart, meta, excerpt.
                         */
                        do_action( 'woocommerce_single_product_summary' );
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * Output: tabs, upsells, related products.
     */
    do_action( 'woocommerce_after_single_product_summary' );
    ?>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
