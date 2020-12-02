<?php get_header(); ?>
    <main class="main">
        <!-- Sub Categories -->
        <section class="section products-subcat">
            <div class="container products-subcat__container">
                <div class="products-subcat__list row-flex j-between">
                    <a href='/products.html' class="products-subcat__item col">
                        <div class="products-subcat__image">
                            <img src="<?php print get_theme_file_uri(); ?>/img/direction-1.png" alt="">
                        </div>
                        <div class="products-subcat__name">Bed linen sets</div>
                    </a>
                    <a href='/products.html' class="products-subcat__item col">
                        <div class="products-subcat__image">
                            <img src="<?php print get_theme_file_uri(); ?>/img/direction-2.png" alt="">
                        </div>
                        <div class="products-subcat__name">Duvet covers</div>
                    </a>
                    <a href='/products.html' class="products-subcat__item col">
                        <div class="products-subcat__image">
                            <img src="<?php print get_theme_file_uri(); ?>/img/direction-1.png" alt="">
                        </div>
                        <div class="products-subcat__name">Pillowcases & SHAMS</div>
                    </a>
                    <a href='/products.html' class="products-subcat__item col">
                        <div class="products-subcat__image">
                            <img src="<?php print get_theme_file_uri(); ?>/img/direction-2.png" alt="">
                        </div>
                        <div class="products-subcat__name">Top flat embroidered sheets</div>
                    </a>
                    <a href='/products.html' class="products-subcat__item col">
                        <div class="products-subcat__image">
                            <img src="<?php print get_theme_file_uri(); ?>/img/direction-1.png" alt="">
                        </div>
                        <div class="products-subcat__name">Flat sheets</div>
                    </a>
                    <a href='/products.html' class="products-subcat__item col">
                        <div class="products-subcat__image">
                            <img src="<?php print get_theme_file_uri(); ?>/img/direction-2.png" alt="">
                        </div>
                        <div class="products-subcat__name">Fitted sheets</div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Products -->
        <section class="section products-page">
            <div class="container">
                <div class="section__head row-flex j-between a-start">
                    <!-- Title -->
                    <h1 class="products__title section__title col">Bed linen sets</h1>

                    <!-- Sort -->
                    <div class='sort col'>
                        <div class="sort__burger">
                            <span class="sort__burger-dash"></span>
                            <span class="sort__burger-dash"></span>
                            <span class="sort__burger-dash"></span>
                        </div>
                        <div class="sort__head flex a-center">
                            <div class="sort__caption">Sort By:</div>
                            <div class="sort__value">Recommendations</div>
                            <img class="sort__arrow" src="<?php print get_theme_file_uri(); ?>/img/svg/icon-arrow-right.svg" alt="">
                        </div>
                        <div class="sort__dropdown">
                            <a class='sort__dropdown-link active' href="#">Recommendations</a>
                            <a class='sort__dropdown-link' href="#">New Arrivals</a>
                            <a class='sort__dropdown-link' href="#">Price: Low to High</a>
                            <a class='sort__dropdown-link' href="#">Price: High to Low</a>
                            <div class='sort__close-mob'>
                                <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-close.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- List -->
                <div class="products-page__list row-flex">
                    <!-- Product -->
                    <div class="product products-page__item col">
                        <div class="product__label">
                            <div class="product__label-item product__label_best">Best seller</div>
                            <div class="product__label-item product__label_coton flex a-center">
                                <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-coton.svg" alt="">
                                100% cotton
                            </div>
                        </div>
                        <a href='/product-page.html' class="product__preview">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-big-1.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name products-page__product-name">Bed linen set
                            “Christmas
                            toys”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>

                    <!-- Product -->
                    <div class="product products-page__item col">
                        <div class="product__label">
                            <div class="product__label-item product__label_best">Best seller</div>
                        </div>
                        <a href='/product-page.html' class="product__preview">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-big-2.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name products-page__product-name">DUVET COVER
                            “SUMMER
                            GARDEN”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>

                    <!-- Product -->
                    <div class="product products-page__item col">
                        <div class="product__label">
                            <div class="product__label-item product__label_coton flex a-center">
                                <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-coton.svg" alt="">
                                100% cotton
                            </div>
                        </div>
                        <a href='/product-page.html' class="product__preview">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-big-3.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name products-page__product-name">Bed linen set
                            “Christmas
                            toys”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>

                    <!-- Product -->
                    <div class="product products-page__item col">
                        <a href='/product-page.html' class="product__preview">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-big-4.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name products-page__product-name">DUVET COVER
                            “SUMMER
                            GARDEN”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>

                    <!-- Product -->
                    <div class="product products-page__item col">
                        <a href='/product-page.html' class="product__preview product__preview_double">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-double-1.png" alt="">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-double-2.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name products-page__product-name">Bed linen set
                            “Christmas
                            toys”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>

                    <!-- Product -->
                    <div class="product products-page__item col">
                        <div class="product__label">
                            <div class="product__label-item product__label_coton flex a-center">
                                <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-coton.svg" alt="">
                                100% cotton
                            </div>
                        </div>
                        <a href='/product-page.html' class="product__preview product__preview_double">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-double-1.png" alt="">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-double-2.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name products-page__product-name">DUVET COVER
                            “SUMMER
                            GARDEN”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>
                </div>

                <!-- Pagination -->
                <ul class="pagination">
                    <li class='pagination__item pagination__control pagination__control_prev'>
                        <a class='pagination__link' href="#">Previous</a>
                    </li>

                    <li class='pagination__item pagination__num'>
                        <a class='pagination__link' href="#">1</a>
                    </li>

                    <li class='pagination__item pagination__num active'>
                        <a class='pagination__link' href="#">2</a>
                    </li>

                    <li class='pagination__item pagination__num'>
                        <a class='pagination__link' href="#">3</a>
                    </li>

                    <li class='pagination__item pagination__num'>
                        <a class='pagination__link' href="#">4</a>
                    </li>

                    <li class='pagination__item pagination__num'>
                        <a class='pagination__link' href="#">...</a>
                    </li>

                    <li class='pagination__item pagination__control pagination__control_next'>
                        <a class='pagination__link' href="#">Next</a>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Products -->
        <section class="section products products-slider bg-gray products-page__same">
            <div class="container">
                <div class="section__head row-flex j-between a-center">
                    <!-- Title -->
                    <h2 class="products__title section__title col">You may also like</h2>
                </div>

                <!-- List -->
                <div class="products__list products-slider__list">
                    <!-- Product -->
                    <div class="product products-slider__item">
                        <a href='/product-page.html' class="product__preview">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-1.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name">Bed linen set “Christmas toys”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>

                    <!-- Product -->
                    <div class="product products-slider__item">
                        <a href='/product-page.html' class="product__preview">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-2.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name">DUVET COVER “SUMMER GARDEN”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>

                    <!-- Product -->
                    <div class="product products-slider__item">
                        <a href='/product-page.html' class="product__preview">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-1.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name">Bed linen set “Christmas toys”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>

                    <!-- Product -->
                    <div class="product products-slider__item">
                        <a href='/product-page.html' class="product__preview">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-2.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name">DUVET COVER “SUMMER GARDEN”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>

                    <!-- Product -->
                    <div class="product products-slider__item">
                        <a href='/product-page.html' class="product__preview">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-1.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name">Bed linen set “Christmas toys”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>

                    <!-- Product -->
                    <div class="product products-slider__item">
                        <a href='/product-page.html' class="product__preview">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-2.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name">DUVET COVER “SUMMER GARDEN”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>

                    <!-- Product -->
                    <div class="product products-slider__item">
                        <a href='/product-page.html' class="product__preview">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-1.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name">Bed linen set “Christmas toys”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>

                    <!-- Product -->
                    <div class="product products-slider__item">
                        <a href='/product-page.html' class="product__preview">
                            <img src="<?php print get_theme_file_uri(); ?>/img/temp/product-2.png" alt="">
                        </a>
                        <a href='/product-page.html' class="product__name">DUVET COVER “SUMMER GARDEN”</a>
                        <div class="product__descr">Short product description here</div>
                        <div class="product__price">655.00€</div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>