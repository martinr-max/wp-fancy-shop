<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body <?php body_class(); ?>>
        <header>
            <section class="search"><?php get_search_form(); ?></section>
            <section class="top-bar">
               
                <div class="brand"> 
                    <figure class="brand-img">
                        <img src="http://localhost:8888/woocommerce-tutorial/wp-content/uploads/2021/06/14488312171537856955-1.svg" alt="">
                    </figure>
                    <p>Fancy</p> <p>Shop</p>
                </div>
                <div class="navigation">
                    <div class="account">Account</div>
                    <div class="menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'fancy-shop-main-menu'
                        ));
                         ?>
                    </div>
                </div>
            </section>
        </header>