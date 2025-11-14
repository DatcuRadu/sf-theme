<?php
/**
 * Enqueue parent theme styles and custom assets.
 */
function saffordequipment_shop_enqueue_assets() {

    // 1. Storefront parent CSS
    wp_enqueue_style(
        'storefront-parent-style',
        get_template_directory_uri() . '/style.css'
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