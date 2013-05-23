<?php 
// Disable WooCommerce styles 
define( 'WOOCOMMERCE_USE_CSS', false );

// Custom Currency
add_filter( 'woocommerce_currencies', 'add_my_currency' );
 
function add_my_currency( $currencies ) {
    $currencies['VND'] = __( 'Vietnamese Dong (VND)', 'woocommerce' );
    return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
 
function add_my_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'VND': $currency_symbol = 'VND'; break;
    }
    return $currency_symbol;
}

// Display 24 products per page. Goes in functions.php
$ytc_shop_number_products_per_page = ot_get_option('ytc_shop_number_products_per_page');

if (is_numeric($ytc_shop_number_products_per_page))
    $ytc_shop_number_products_per_page = (int) $ytc_shop_number_products_per_page;
else
    $ytc_shop_number_products_per_page = 24;

add_filter('loop_shop_per_page', create_function( '$cols', "return {$ytc_shop_number_products_per_page};"));


function comeasy_wooshare() { 
    echo '<div class="social">';
    
    include(get_template_directory() . '/inc/social/social.php');

    echo '</div>';
}

add_action('woocommerce_share', 'comeasy_wooshare');