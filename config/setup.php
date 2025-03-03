<?php

// Prevent direct access
if (!defined('ABSPATH')) exit;

// add styles and scripts

function theme_enqueue_scripts() {
    // Styles
    wp_enqueue_style('bootstrap_css', get_template_directory_uri(). '/styles/minified/bootstrap.min.css', array(), filemtime(get_template_directory() . '/styles/minified/bootstrap.min.css'));
    wp_enqueue_style('reset', get_template_directory_uri(). '/styles/minified/reset.css', array(), filemtime(get_template_directory() . '/styles/minified/reset.css'));
    wp_enqueue_style('swiper_css', get_template_directory_uri(). '/styles/minified/swiper-bundle.min.css', array(), filemtime(get_template_directory() . '/styles/minified/swiper-bundle.min.css'));
    wp_enqueue_style('default', get_template_directory_uri(). '/styles/minified/default.min.css', array(), filemtime(get_template_directory() . '/styles/minified/default.min.css'));
    wp_enqueue_style('style', get_template_directory_uri(). '/styles/minified/style.min.css', array(), filemtime(get_template_directory() . '/styles/minified/style.min.css'));

    // Scripts
    wp_enqueue_script('jquery_js', get_template_directory_uri() . '/scripts/minified/jquery.min.js', array(), filemtime(get_template_directory() . '/scripts/minified/jquery.min.js'), true);
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/scripts/minified/bootstrap.bundle.min.js', array(), filemtime(get_template_directory() . '/scripts/minified/bootstrap.bundle.min.js'), true);
    wp_enqueue_script('swiper_js', get_template_directory_uri() . '/scripts/minified/swiper-bundle.min.js', array(), filemtime(get_template_directory() . '/scripts/minified/swiper-bundle.min.js'), true);
    wp_enqueue_script('script', get_template_directory_uri() . '/scripts/script.js', array(), filemtime(get_template_directory() . '/scripts/script.js'), true);

    // Localize script for AJAX
    wp_localize_script('script', 'wordpress', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('wp_admin_nonce'),
        'site_url' => get_site_url(),
    ));
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// Remove tool bar

add_filter('show_admin_bar', '__return_false');