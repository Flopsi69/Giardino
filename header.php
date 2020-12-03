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
                                        <?php $_subcategories[$category->slug] = $subcategories->terms; ?>
                                        <li class="nav__sublist-item">
                                            <a class="nav__sublist-link" href="<?php echo get_term_link($subcategory); ?>">
                                                <div class="nav__sublist-image">
                                                    <?php
                                                    $image_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);
                                                    $image = wp_get_attachment_image_url($image_id, 'large');
                                                    ?>
                                                    <img src="<?php echo $image; ?>" alt="">
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
                                        <a class="nav__sublist-link" href="<?php echo get_product_url($collection); ?>">
                                            <div class="nav__sublist-image">
                                                <img src="<?php echo get_product_image($collection); ?>" alt="">
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
                            <path d="M294.111 256.001L504.109 46.003c10.523-10.524 10.523-27.586 0-38.109-10.524-10.524-27.587-10.524-38.11 0L256 217.892 46.002 7.894C35.478-2.63 18.416-2.63 7.893 7.894s-10.524 27.586 0 38.109l209.998 209.998L7.893 465.999c-10.524 10.524-10.524 27.586 0 38.109 10.524 10.524 27.586 10.523 38.109 0L256 294.11l209.997 209.998c10.524 10.524 27.587 10.523 38.11 0 10.523-10.524 10.523-27.586 0-38.109L294.111 256.001z">
                            </path>
                        </svg>
                    </a>
                    <!-- NavBlock -->
                    <div class="navbar__block navbar__main active">
                        <!-- Head -->
                        <div class="navbar__header">Products</div>
                        <!-- List -->
                        <div class="navbar__list">
                            <?php if (!empty($categories)) { ?>
                                <?php foreach ($categories->terms as $category) { ?>
                                    <a href="<?php echo get_term_link($category); ?>" class="navbar-link navbar-link__direction <?php echo (!empty($_subcategories[$category->slug]) ? 'navbar-link__direction_dropdown' : ''); ?>" data-target="<?php echo $category->slug; ?>">
                                        <div class="navbar-link__direction-name"><?php echo $category->name; ?></div>
                                        <div class="navbar-link__direction-image">
                                            <?php
                                            $image_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                                            $image = wp_get_attachment_image_url($image_id, 'large');
                                            ?>
                                            <img src="<?php echo $image; ?>" alt="">
                                        </div>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                            <?php if (!empty($collections)) { ?>
                                <a href="/collections/" class="navbar-link navbar-link__direction navbar-link__direction_dropdown" data-target="collections">
                                    <div class="navbar-link__direction-name ">Collections</div>
                                    <div class="navbar-link__direction-image">
                                        <img src="<?php print get_theme_file_uri(); ?>/img/direction-1.png" alt="">
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if (!empty($categories)) { ?>
                        <?php foreach ($categories->terms as $category) { ?>
                            <?php if (!empty($_subcategories[$category->slug])) { ?>
                            <!-- NavBlock -->
                            <div class="navbar__block navbar__products" data-nav-id="<?php echo $category->slug; ?>">
                                <!-- Head -->
                                <div class="navbar__header">
                                    <a href="#" class="navbar__header-back">
                                        <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-arrow-back.svg" alt="">
                                    </a>
                                    <?php echo $category->name; ?>
                                </div>
                                <!-- List -->
                                <div class="navbar__list">
                                    <?php foreach ($_subcategories[$category->slug] as $subcategory) { ?>
                                    <!-- Item -->
                                    <a href="<?php echo get_term_link($subcategory); ?>" class="navbar-link navbar-link__second">
                                        <div class="navbar-link__image">
                                            <?php
                                            $image_id = get_term_meta($subcategory->term_id, 'thumbnail_id', true);
                                            $image = wp_get_attachment_image_url($image_id, 'large');
                                            ?>
                                            <img src="<?php echo $image; ?>" alt="">
                                        </div>
                                        <div class="navbar-link__name"><?php echo $subcategory->name; ?></div>
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if (!empty($collections)) { ?>
                    <!-- NavBlock -->
                    <div class="navbar__block navbar__collections upper" data-nav-id="collections">
                        <!-- Head -->
                        <div class="navbar__header">
                            <a href="#" class="navbar__header-back">
                                <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-arrow-back.svg" alt="">
                            </a>
                            Collections
                        </div>
                        <!-- List -->
                        <div class="navbar__list">
                            <?php foreach ($collections as $collection) { ?>
                            <!-- Item -->
                            <a href="<?php echo get_product_url($collection); ?>" class="navbar-link navbar-link__second">
                                <div class="navbar-link__image">
                                    <img src="<?php echo get_product_image($collection); ?>" alt="">
                                </div>
                                <div class="navbar-link__name"><?php echo $collection->get_name(); ?></div>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
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
            <?php $cart_items = get_cart_items(); ?>
            <?php if (!empty($cart_items)) { ?>
            <div class="cart__body">
                <!-- List -->
                <div class="cart__products">
                    <?php foreach ($cart_items as $key => $item) { ?>
                        <?php $product = $item['data']; ?>
                        <!-- Product -->
                        <div class="cart__product" data-item-key="<?php echo $key; ?>" data-quantity="<?php echo $item['quantity']; ?>">
                        <a href="<?php echo get_product_url($product) ?>" class="cart__product-preview">
                            <img src="<?php echo get_product_image($product); ?>" alt="<?php echo $product->get_name(); ?>">
                        </a>

                        <div class="cart__product-info">
                            <a href="<?php echo get_product_url($product) ?>" class="cart__product-title"><?php echo $product->get_name(); ?></a>

                                    <?php $attributes = get_product_attributes($product); ?>
                                    <?php if (!empty($attributes)) { ?>
                                        <?php foreach ($attributes as $att_key => $attribute) { ?>
                                            <?php if (!empty($attribute['options'])) { ?>
                                                <div class="pdp__size">
                                                    <div class="pdp-look__caption hidden-sm">Size:</div>
                                                    <div class="pdp__size-select select">
                                                        <select>
                                                            <?php foreach ($attribute['options'] as $slug => $option) { ?>
                                                                <option data-key="<?php echo $att_key; ?>" data-value="<?php echo $slug; ?>" value="<?php echo $slug; ?>" <?php echo ($item[$att_key] === $slug ? 'selected' : ''); ?>><?php echo $option; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php $colors = get_product_variation_colors($product); ?>
                                    <?php if (!empty($colors)) { ?>
                                        <div class="colors cart__product-colors">
                                            <div class="pdp-look__caption hidden-sm">Color:</div>
                                            <div class="towel-colors__list">
                                                <?php foreach ($colors as $variation_id => $color) { ?>
                                                    <div data-name="<?php echo $color['name']; ?>" data-value="<?php echo $color['slug']; ?>" data-key="pa_color" class="towel-colors__item <?php echo ($item['pa_color'] === $color['slug'] ? 'active' : ''); ?>" style="<?php echo $color['background']; ?>"></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="cart__product-buy">
                                        <div class="count">
                                            <button class="btn count__btn count__btn_small count__minus">-</button>
                                            <input class="count__value" type="number" value="<?php echo $item['quantity']; ?>" min="1" max="1000">
                                            <button class="btn count__btn count__btn_small count__plus">+</button>
                                        </div>
                                        <div class="cart__product-price pdp-look__caption"><?php echo $item['line_total']; ?><?php echo get_woocommerce_currency_symbol(); ?></div>
                                        <a href="#" class="cart__product-cancel">
                                            <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-close.svg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <div class="cart__products-total">
                <div class="cart__products-caption">Total:</div>
                <div class="cart__products-price">655.00€</div>
            </div>

            <div class="cart__footer">
                <a href="/checkout/" class="cart__footer-checkout btn btn_blue w-100">Checkout</a>
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