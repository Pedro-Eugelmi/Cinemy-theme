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

// Loja

// Remove sidebar 

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// Remove add to cart 

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Remove price

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);

// Remove product link
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);

// Add movie link 

add_action('woocommerce_before_shop_loop_item', function() {
    $movieId = get_field("filme");
    echo '<a href="' . get_permalink($movieId) .'">';
}, 11);

// Thumbnail 

add_action('woocommerce_before_shop_loop_item_title', function() {
    echo '<div class="thumbnail-wrapper">';
}, 9);

add_action('woocommerce_before_shop_loop_item_title', function() {
    echo '</div>';
    echo '</a>';
}, 10);


// Conteúdo do produto - loop

add_action('woocommerce_after_shop_loop_item_title', 'cinemy_product_content' , 11);

function cinemy_product_content() {
    $exibicao = get_field("exibicao");
    $sala = get_field("sala");
    ?>
        <div class="product-loop-content">
            <a class="products-session-item" href="<?php echo get_the_permalink() ?>">
                <span class="products-session-item-date">
                    <?php echo date("d/M - H:i", strtotime($exibicao)); ?>
                </span>

                <span class="products-session-item-title">
                    Compre já
                </span>
            </a>
        </div>
    <?php
}



