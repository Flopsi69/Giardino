<?php cart_control(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Giardion</title>
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="<?php print get_theme_file_uri(); ?>/img/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" sizes="16x16" href="<?php print get_theme_file_uri(); ?>/img/favicons/favicon-16x16.png" type="image/png">
    <link rel="icon" sizes="32x32" href="<?php print get_theme_file_uri(); ?>/img/favicons/favicon-32x32.png" type="image/png">
    <link rel="apple-touch-icon-precomposed" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="1024x1024" href="<?php print get_theme_file_uri(); ?>/img/favicons/apple-touch-icon-1024x1024.png">
    <link rel="stylesheet" href="<?php print get_theme_file_uri(); ?>/styles/main.css">
    <?php wp_head(); ?>
</head>
<body>
<!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header__row row-flex a-center j-between">
                <!-- Logo -->
                <a href="/" class="logo header__logo col">
                    <img src="<?php print get_theme_file_uri(); ?>/img/logo.png" alt="">
                </a>
                <!-- Navigation -->
                <div class="header__navbar-desktop col">
                    <!-- Burger mobile -->
                    <button class="burger">
                        <span class="burger__span"></span>
                        <span class="burger__span"></span>
                        <span class="burger__span"></span>
                    </button>
                    <!-- Navigation -->

                    <nav class="nav header__nav">
                        <!-- List -->
                        <?php
                        $args = array(
                            'taxonomy' => array('product_cat'),
                            'parent' => 0,
                            'hide_empty' => true,
                            'exclude' => 15
                        );
                        $categories = new WP_Term_Query($args);
                        ?>
                        <?php if (!empty($categories)) { ?>
                        <ul class="nav__list flex">
                            <?php foreach($categories->terms as $category) { ?>
                            <!-- Item -->
                            <li class="nav__list-item">
                                <a class="nav__link" href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a>
                                <?php
                                $args = array(
                                    'taxonomy' => array('product_cat'),
                                    'parent' => $category->term_id,
                                    'hide_empty' => true,
                                    'exclude' => 15
                                );
                                $subcategories = new WP_Term_Query($args);
                                ?>
                                <?php if (!empty($subcategories)) { ?>
                                <!-- Item Sublist -->
                                <ul class="nav__sublist text-center">
                                    <?php foreach ($subcategories->terms as $subcategory) { ?>
                                    <li class="nav__sublist-item">
                                        <a class="nav__sublist-link" href="<?php echo get_term_link($subcategory); ?>">
                                            <div class="nav__sublist-image">
                                                <?php
                                                $image_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);
                                                $image = wp_get_attachment_image_url($image_id, 'large');
                                                ?>
                                                <img src="<?php echo $image; ?>" alt="<?php echo $subcategory->name; ?>">
                                            </div>
                                            <div class="nav__sublist-name"><?php echo $subcategory->name; ?></div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                            </li>
                            <?php } ?>
                            <?php $collections = get_product_collections(0); ?>
                            <?php if (!empty($collections)) { ?>
                            <!-- Item -->
                            <li class="nav__list-item">
                                <a class="nav__link" href="/collections/">Explore by Collection</a>
                                <!-- Item Sublist -->
                                <ul class="nav__sublist nav__sublist-collection">
                                    <?php foreach ($collections as $collection) { ?>
                                    <li class="nav__sublist-item">
                                        <a class="nav__sublist-link" href="<?php echo get_permalink($collection->get_id()); ?>">
                                            <div class="nav__sublist-image">
                                                <img src="<?php echo get_the_post_thumbnail_url($collection->get_id()); ?>" alt="<?php echo $collection->get_name(); ?>">
                                            </div>
                                            <div class="nav__sublist-name"><?php echo $collection->get_name(); ?></div>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </nav>

                </div>
                <!-- Navbar -->
                <div class="navbar">
                    <!-- Navbar close -->
                    <a href="#" class="navbar__close">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001" width="512" height="512">
                            <path
                                    d="M294.111 256.001L504.109 46.003c10.523-10.524 10.523-27.586 0-38.109-10.524-10.524-27.587-10.524-38.11 0L256 217.892 46.002 7.894C35.478-2.63 18.416-2.63 7.893 7.894s-10.524 27.586 0 38.109l209.998 209.998L7.893 465.999c-10.524 10.524-10.524 27.586 0 38.109 10.524 10.524 27.586 10.523 38.109 0L256 294.11l209.997 209.998c10.524 10.524 27.587 10.523 38.11 0 10.523-10.524 10.523-27.586 0-38.109L294.111 256.001z">
                            </path>
                        </svg>
                    </a>
                    <!-- NavBlock -->
                    <div class="navbar__block navbar__main active">
                        <!-- Head -->
                        <div class="navbar__header">Products</div>
                        <!-- List -->
                        <div class="navbar__list">
                            <!-- Item -->
                            <a href="/products.html"
                               class="navbar-link navbar-link__direction navbar-link__direction_dropdown"
                               data-target="1">
                                <div class="navbar-link__direction-name ">Bed linen</div>
                                <div class="navbar-link__direction-image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/direction-1.png" alt="">
                                </div>
                            </a>
                            <!-- Item -->
                            <a href="/products.html" class="navbar-link navbar-link__direction">
                                <div class="navbar-link__direction-name ">Towels</div>
                                <div class="navbar-link__direction-image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/direction-2.png" alt="">
                                </div>
                            </a>
                            <!-- Item -->
                            <a href="/products.html" class="navbar-link navbar-link__direction">
                                <div class="navbar-link__direction-name ">L’ART DE LA TABLE</div>
                                <div class="navbar-link__direction-image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/direction-1.png" alt="">
                                </div>
                            </a>
                            <!-- Item -->
                            <a href="/products.html" class="navbar-link navbar-link__direction">
                                <div class="navbar-link__direction-name ">Decorations</div>
                                <div class="navbar-link__direction-image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/direction-3.png" alt="">
                                </div>
                            </a>
                            <!-- Item -->
                            <a href="/products.html"
                               class="navbar-link navbar-link__direction navbar-link__direction_dropdown"
                               data-target="2">
                                <div class="navbar-link__direction-name ">Collections</div>
                                <div class="navbar-link__direction-image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/direction-1.png" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- NavBlock -->
                    <div class="navbar__block navbar__products" data-nav-id="1">
                        <!-- Head -->
                        <div class="navbar__header">
                            <a href="#" class="navbar__header-back">
                                <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-arrow-back.svg" alt="">
                            </a>
                            Bed linen
                        </div>
                        <!-- List -->
                        <div class="navbar__list">
                            <!-- Item -->
                            <a href="/products.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/direction-1.png" alt="">
                                </div>
                                <div class="navbar-link__name">Bed linen</div>
                            </a>
                            <!-- Item -->
                            <a href="/products.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/direction-2.png" alt="">
                                </div>
                                <div class="navbar-link__name">Duvet covers</div>
                            </a>
                            <!-- Item -->
                            <a href="/products.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/direction-1.png" alt="">
                                </div>
                                <div class="navbar-link__name">Pillowcases & Shams</div>
                            </a>
                            <!-- Item -->
                            <a href="/products.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/direction-2.png" alt="">
                                </div>
                                <div class="navbar-link__name">Top flat embroidered sheets</div>
                            </a>
                            <!-- Item -->
                            <a href="/products.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/direction-1.png" alt="">
                                </div>
                                <div class="navbar-link__name">Flat sheets</div>
                            </a>
                            <!-- Item -->
                            <a href="/products.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/direction-2.png" alt="">
                                </div>
                                <div class="navbar-link__name">Fitted sheets</div>
                            </a>
                        </div>
                    </div>
                    <!-- NavBlock -->
                    <div class="navbar__block navbar__collections upper" data-nav-id="2">
                        <!-- Head -->
                        <div class="navbar__header">
                            <a href="#" class="navbar__header-back">
                                <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-arrow-back.svg" alt="">
                            </a>
                            Collections
                        </div>
                        <!-- List -->
                        <div class="navbar__list">
                            <!-- Item -->
                            <a href="/collection-page.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-2.png" alt="">
                                </div>
                                <div class="navbar-link__name">Sakura</div>
                            </a>
                            <!-- Item -->
                            <a href="/collection-page.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/temp/collection-2.png" alt="">
                                </div>
                                <div class="navbar-link__name">Lily of Valley</div>
                            </a>
                            <!-- Item -->
                            <a href="/collection-page.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/temp/collection-3.png" alt="">
                                </div>
                                <div class="navbar-link__name">Giardino by giardino</div>
                            </a>
                            <!-- Item -->
                            <a href="/collection-page.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/temp/collection-4.png" alt="">
                                </div>
                                <div class="navbar-link__name">Summer garden</div>
                            </a>
                            <!-- Item -->
                            <a href="/collection-page.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-2.png" alt="">
                                </div>
                                <div class="navbar-link__name">Butterfly</div>
                            </a>
                            <!-- Item -->
                            <a href="/collection-page.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/temp/collection-2.png" alt="">
                                </div>
                                <div class="navbar-link__name">Concorde</div>
                            </a>
                            <!-- Item -->
                            <a href="/collection-page.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/temp/collection-3.png" alt="">
                                </div>
                                <div class="navbar-link__name">Snowflakes</div>
                            </a>
                            <!-- Item -->
                            <a href="/collection-page.html" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/temp/collection-4.png" alt="">
                                </div>
                                <div class="navbar-link__name">Christmas toys</div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Basket -->
                <a href="#" class="header__basket col">
                    <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-basket.svg" alt="">
                    <!-- <img src="<?php print get_theme_file_uri(); ?>/img/icon-basket.png" alt=""> -->
                </a>
            </div>
        </div>
    </header>

    <div class="cart">
        <div class="cart__inner">
            <div class="cart__head flex a-center j-between">
                <div class="cart__head-title flex a-center"><img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-arrow-back.svg" alt=""> Continue shopping
                </div>
                <a href="#" class="cart__head-close">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.001 512.001" width="512" height="512">
                        <path d="M294.111 256.001L504.109 46.003c10.523-10.524 10.523-27.586 0-38.109-10.524-10.524-27.587-10.524-38.11 0L256 217.892 46.002 7.894C35.478-2.63 18.416-2.63 7.893 7.894s-10.524 27.586 0 38.109l209.998 209.998L7.893 465.999c-10.524 10.524-10.524 27.586 0 38.109 10.524 10.524 27.586 10.523 38.109 0L256 294.11l209.997 209.998c10.524 10.524 27.587 10.523 38.11 0 10.523-10.524 10.523-27.586 0-38.109L294.111 256.001z"></path>
                    </svg>
                </a>
            </div>

            <div class="cart__footer">
                <a href='/checkout.html' class="cart__footer-checkout btn btn_blue w-100">Checkout</a>
                <div class="cart__footer-divider text-center hidden-md">Or</div>
                <div class="cart__footer-buttons flex j-between">
                    <button class="cart__footer-pay btn btn_trans w-100"><img src="<?php print get_theme_file_uri(); ?>/img/paypal.png" alt=""></button>
                    <button class="cart__footer-pay cart__footer-applepay btn btn_trans w-100">
                        <img src="<?php print get_theme_file_uri(); ?>/img/applepay.png" alt="">
                    </button>
                </div>
            </div>
        </div>
    </div>