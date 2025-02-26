<?php   

//  Enqueue the scripts and style / setup functions  

require_once get_template_directory() . '/config/setup.php';

// Add theme supports 

require_once get_template_directory() . '/config/theme-support.php';

// Add menus 

require_once get_template_directory() . '/config/menus.php';

// Woocommerce functions 

if ( class_exists( 'WooCommerce' ) ) {
    require_once get_template_directory() . '/config/shop.php';
}