<?php 
// Prevent direct access
if (!defined('ABSPATH')) exit;

// Add support for post thumbnails
add_theme_support('post-thumbnails');

// Add support for custom logo
add_theme_support('custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
));