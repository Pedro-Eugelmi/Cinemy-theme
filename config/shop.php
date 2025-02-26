<?php 

// Prevent direct access
if (!defined('ABSPATH')) exit;

// Add support to woocommerce 

add_theme_support('woocommerce');

// Disable WooCommerce default styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_filter( 'woocommerce_enqueue_styles', function( $styles ) {
    unset( $styles['woocommerce-general'] ); 
    unset( $styles['woocommerce-layout'] );  
    unset( $styles['woocommerce-smallscreen'] ); 
    return $styles;
} );

