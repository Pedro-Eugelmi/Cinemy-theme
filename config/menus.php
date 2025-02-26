<?php

// Prevent direct access
if (!defined('ABSPATH')) exit;

// Register navigation menus
function my_theme_register_menus() {
    register_nav_menus(array(
        'header' => __('header Menu', 'tema'),
        'footer'  => __('Footer Menu', 'tema'),
    ));
}
add_action('after_setup_theme', 'my_theme_register_menus');
