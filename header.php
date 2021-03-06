<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header class="row">
            <a href="/" class="logo-wrapper">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/logo-white.png" id="logo" alt="logo" />
            </a>

            <div id="mobile-menu-toggle">
                <i class="fa fa-bars"></i>
            </div>
            <div class="menu-wrapper">
                <?php
                    if (has_nav_menu('main')) {
                        wp_nav_menu(array(
                            'menu_class'    => 'sm-menu menu openers',
                            'menu_id'       => 'main-menu',
                            'container'     => false,
                            'echo'          => true,
                            'walker'        => new BlockyWalker(),
                        ));
                    }
                ?>
            </div>
        </header>
