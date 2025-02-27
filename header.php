<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aleo:ital,wght@0,100..900;1,100..900&family=Fira+Sans+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>
<body>

<header class="header container-fluid">
    <div class="container">
        <div class="row py-2">
            <div class="col-4 header-logo">
                <?php echo get_custom_logo() ?>
            </div>
            <div class="col-8">
            <?php 
                wp_nav_menu(array(
                    'theme_location' => 'header',
                    'menu_class'     => 'header-menu', // Add custom CSS class
                    'container'      => 'nav', // Wrap menu in <nav>
                ));
            ?>
            </div>
        </div>
    </div>
</header>
    
