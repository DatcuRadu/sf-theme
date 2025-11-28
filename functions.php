<?php
/**
 * Enqueue parent theme styles and custom assets.
 */

require get_theme_file_path('/include/class-sf-mobile-walker.php');


function mytheme_setup() {

    // Suport pentru titlu automat
    add_theme_support( 'title-tag' );

    // Suport pentru imagini
    add_theme_support( 'post-thumbnails' );

    // Suport WooCommerce
    add_theme_support( 'woocommerce', [
        'thumbnail_image_width' => 400,
        'single_image_width'    => 800,
        'product_grid' => [
            'default_rows'    => 4,
            'min_rows'        => 1,
            'max_rows'        => 10,
            'default_columns' => 4,
            'min_columns'     => 1,
            'max_columns'     => 6,
        ],
    ] );

    // Gallery features
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Meniu-uri
    register_nav_menus([
        'main-menu'   => 'Main Menu',
        'footer-menu' => 'Footer Menu',
        'mobile-menu' => 'Mobile Menu',
    ]);
}
add_action( 'after_setup_theme', 'mytheme_setup' );


add_image_size( 'my-thumb-small', 150, 150, true );
add_image_size( 'my-thumb-medium', 300, 300, true );
add_image_size( 'my-hero', 1920, 600, true );

function saffordequipment_shop_enqueue_assets() {

    // 1. Storefront parent CSS
    wp_enqueue_style(
        'storefront-parent-style',
        get_template_directory_uri() . '/styles.css'
    );

    // 2. Typekit fonts (Adobe)
    wp_enqueue_style(
        'saffordequipment-typekit',
        'https://use.typekit.net/ryn7bkj.css',
        array(),
        null
    );

    // 3. Font Awesome (fișierele tale locale din /src)
    wp_enqueue_style(
        'saffordequipment-fa-all',
        get_stylesheet_directory_uri() . '/src/styles.css',
        array(),
        null
    );


    // 4. Tailwind + custom CSS generate de Webpack: /dist/styles.css
    $css_file = get_stylesheet_directory() . '/dist/styles.css';
    if ( file_exists( $css_file ) ) {
        wp_enqueue_style(
            'saffordequipment-tailwind',
            get_stylesheet_directory_uri() . '/dist/styles.css',
            array( 'storefront-parent-style' ),
            filemtime( $css_file ) // versiune = last modified (cache busting)
        );
    }

    // 5. JS bundle generat de Webpack: /dist/bundle.js
    $js_file = get_stylesheet_directory() . '/dist/bundle.js';
    if ( file_exists( $js_file ) ) {
        wp_enqueue_script(
            'saffordequipment-bundle',
            get_stylesheet_directory_uri() . '/dist/bundle.js',
            array(),              // adaugă 'jquery' aici dacă ai nevoie
            filemtime( $js_file ),// versiune = last modified
            true                  // în footer
        );
    }
}

add_action( 'wp_enqueue_scripts', 'saffordequipment_shop_enqueue_assets' );


function saffordequipment_register_custom_menus() {
    register_nav_menus( array(
        'shop_department_menu' => __( 'Shop Department Menu', 'saffordequipment-shop' ),
        'help_menu'            => __( 'Help Menu', 'saffordequipment-shop' ),
        'company_menu'         => __( 'Company Menu', 'saffordequipment-shop' ),
    ) );
}
add_action( 'after_setup_theme', 'saffordequipment_register_custom_menus' );

/**
 * WooCommerce After Single Product Summary - Custom order
 */
// Related Products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 5 );

// Product Tabs
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 15 );


/**
 * Reorder product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {

    if ( isset( $tabs['reviews'] ) ) {

        if ( empty( $tabs['reviews']['title'] ) ) {
            $tabs['reviews']['title'] = __( 'Reviews', 'woocommerce' );
        }

        if ( empty( $tabs['reviews']['callback'] ) ) {
            $tabs['reviews']['callback'] = 'comments_template';
        }

        $tabs['reviews']['priority'] = 10;
    }

    if ( isset( $tabs['description'] ) ) {
        $tabs['description']['priority'] = 5;
    }

    if ( isset( $tabs['additional_information'] ) ) {
        $tabs['additional_information']['priority'] = 15;
    }

    return $tabs;
}

add_action( 'woocommerce_single_product_summary', function() {
    $content = do_shortcode('[smessages type="Shipping"]');
    if ( $content ) {
        echo '<div class="shipping-message-wrapper">' . $content . '</div>';
    }
}, 11 );

add_action( 'woocommerce_single_product_summary', function() {
    $content = do_shortcode('[smessages type="Noshipping"]');
    if ( $content ) {
        echo '<div class="shipping-message-wrapper">' . $content . '</div>';
    }
}, 12 );

add_shortcode( 'map_price', 'map_price' );
function map_price(  ) {
    global $product;
    if (class_exists('WC_Product_Bundle')) {
        if (is_a($product, 'WC_Product_Bundle') ) {
            $bundled_items = $product->get_bundled_items();
            $bundled_item = array_shift($bundled_items);
            $regular_price = $bundled_item->product->get_regular_price( 'edit' ) ?? $bundled_item->product->get_price( 'edit' );
            $calculetd_price = WC_PB_Product_Prices::get_product_price(
                $bundled_item->product,
                array(
                    'price' => $regular_price,
                    'qty'   => $bundled_item->get_quantity(),
                    'calc'  => '',
                )
            );
            echo sprintf( __( '<div class="budeled_map_price">%s map price:  %s</div>', 'safford-equipment' ), $bundled_item->get_title() , wc_price($calculetd_price) );
        }
    }
}

add_shortcode('discontinued', 'discontinued');
function discontinued()
{
    if (function_exists('dp_alt_products')) {
        if (dp_is_discontinued()) {
            ob_start();
            dp_alt_products();
            $content = ob_get_clean();
            printf('<div class="discontinued_wrapper">%s</div>', $content);
        }

    }
}

add_action( 'woocommerce_single_product_summary', function() {
    $content = do_shortcode('[discontinued]');
    if ( $content ) {
        echo  $content;
    }
}, 13 );