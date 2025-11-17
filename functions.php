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