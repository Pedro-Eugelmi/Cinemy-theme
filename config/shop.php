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

remove_action("woocommerce_before_shop_loop_item_title", "woocommerce_template_loop_product_thumbnail", 10);

add_action("woocommerce_before_shop_loop_item_title", function() {
    $thumbnail = get_the_post_thumbnail_url();

    if (empty($thumbnail)) {
        $thumbnail = get_the_post_thumbnail_url(get_field("filme")); 
    }

    echo '<img class="attachment-woocommerce_thumbnail" src="' . $thumbnail. '">';
}, 11);

add_action('woocommerce_before_shop_loop_item_title', function() {
    echo '</div>';
    echo '</a>';
}, 12);


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

// Single produto

// Adiciona o container
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);

add_action('woocommerce_before_main_content', function() {
    echo '<div class="container">';
}, 10);

// Remove o breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);


// Remove sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// Comprar os tickets
function cinemy_purchase_tickets() {
    $seats = isset($_POST["seats"]) ? sanitize_text_field($_POST["seats"]) : '';
    $quantity = isset($_POST["quantity"]) ? absint($_POST["quantity"]) : 0;
    $session_id = isset($_POST["sessionId"]) ? absint($_POST["sessionId"]) : 0;

    // Verifica se os dados estão preenchidos
    if (!empty($seats) && !empty($quantity) && !empty($session_id)) {
        // Adiciona ao carrinho
        WC()->cart->add_to_cart($session_id, $quantity);

        $message = "SUCESSO! \n Id da sessão: " . $session_id . "\n Quantidade: " . $quantity . "\n Seats: " . $seats;
        wp_send_json_success($message);
    } else {
        $message = "Algo deu errado! \n Id da sessão: " . $session_id . "\n Quantidade: " . $quantity . "\n Seats: " . $seats;
        wp_send_json_error($message);	
    }

    wp_die();
}

add_action('wp_ajax_cinemy_purchase_tickets', 'cinemy_purchase_tickets'); 
add_action('wp_ajax_nopriv_cinemy_purchase_tickets', 'cinemy_purchase_tickets'); 

