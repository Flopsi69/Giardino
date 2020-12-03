<?php get_header(); ?>
    <main class="main">
        <!-- Jumb -->
        <section class="section jumb text-center">
            <div class="container">
                <h1 class="jumb__title upper"><?php echo carbon_get_theme_option('grd-frontpage-hero-title'); ?></h1>
                <div class="jumb__caption">
                    <?php echo carbon_get_theme_option('grd-frontpage-hero-subtitle'); ?>
                </div>
                <div class="jumb__buttons">
                    <a href="<?php echo carbon_get_theme_option('grd-frontpage-hero-category-button-link'); ?>" class="btn btn_blue jumb__btn jumb__buttons-item">
                        <?php echo carbon_get_theme_option('grd-frontpage-hero-category-button-title'); ?></a>
                    <a href="<?php echo carbon_get_theme_option('grd-frontpage-hero-collection-button-link'); ?>" class="btn btn_trans jumb__btn jumb__buttons-item">
                        <?php echo carbon_get_theme_option('grd-frontpage-hero-collection-button-title'); ?></a>
                </div>
            </div>
        </section>

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
        <!-- Directions -->
        <section class="section directions text-center">
            <div class="container directions__container">
                <div class="directions__list row-flex">
                    <?php foreach($categories->terms as $category) { ?>
                    <!-- Item -->
                    <div class="direction directions__item col">
                        <a href="<?php echo get_term_link($category); ?>" class="direction__preview">
                            <img src="<?php echo wp_get_attachment_image_url(get_term_meta($category->term_id, 'thumbnail_id', true), 'large') ?>" alt="<?php echo $category->name; ?>">
                        </a>
                        <a href="<?php echo get_term_link($category); ?>" class="direction__name"><?php echo $category->name; ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
            <?php $count = 0; ?>
            <?php foreach($categories->terms as $category) { ?>
            <!-- Products -->
            <section class="section products <?php echo ($count % 2 === 0 ? '' : 'bg-gray'); ?>">
                <div class="container">
                    <div class="section__head row-flex j-between a-center">
                        <!-- Title -->
                        <h2 class="products__title section__title col"><?php echo $category->name; ?></h2>
                        <!-- Show more -->
                        <a href="<?php echo get_term_link($category); ?>" class="products__more more-btn col hidden-sm">See all bed linen</a>
                    </div>
                    <?php
                    $args = array(
                        'limit' => 4,
                        'status' => 'publish',
                        'type' => array('simple', 'variable'),
                        'category' => $category->slug
                    );
                    $products = wc_get_products($args);
                    ?>
                    <?php if ($products) { ?>
                    <!-- List -->
                    <div class="products__list row-flex">
                        <?php foreach ($products as $product) { ?>
                        <!-- Product -->
                        <div class="product products__item col">
                            <div class="product__label">
                                <?php if (!empty(get_carbon_field('label_best', $product->get_id()))) { ?>
                                    <div class="product__label-item product__label_best">Best seller</div>
                                <?php } ?>
                                <?php if (!empty(get_carbon_field('label_new', $product->get_id()))) { ?>
                                    <div class="product__label-item product__label_new">New</div>
                                <?php } ?>
                                <?php if (!empty(get_carbon_field('label_cotton', $product->get_id()))) { ?>
                                    <div class="product__label-item product__label_coton flex a-center">
                                        <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-coton.svg" alt="">
                                        100% cotton
                                    </div>
                                <?php } ?>
                            </div>
                            <a href="<?php echo get_product_url($product); ?>" class="product__preview">
                                <img src="<?php echo get_product_image($product); ?>" alt="<?php echo $product->get_name(); ?>">
                            </a>
                            <a href="<?php echo get_product_url($product); ?>" class="product__name"><?php echo $product->get_name(); ?></a>
                            <div class="product__descr"><?php echo $product->get_short_description(); ?></div>
                            <div class="product__price"><?php echo $product->get_price(); ?><?php echo get_woocommerce_currency_symbol(); ?></div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>

                    <!-- Show more Mobile -->
                    <a href="<?php echo get_term_link($category); ?>" class="products__more more-btn more-btn_mobile">See all bed linen</a>
                </div>
            </section>
                <?php $count++; ?>
            <?php } ?>
        <?php } ?>

        <!-- Collections -->
        <?php $collections = get_product_collections(0, 4); ?>
        <?php if (!empty($collections)) { ?>
        <section class="section collections">
            <div class="container">
                <div class="section__head row-flex j-between a-center">
                    <!-- Title -->
                    <h2 class="products__title section__title col">Explore by COLLECTION</h2>

                    <!-- Show more -->
                    <a href="/collections/" class="products__more more-btn col hidden-sm">See all collections </a>
                </div>

                <!-- List -->
                <div class="collections__list row-flex">
                    <?php foreach ($collections as $collection) { ?>
                    <!-- Collection -->
                    <a href="<?php echo get_product_url($collection); ?>" class="collection collections__item col">
                        <div class="product__label">
                            <?php if (!empty(get_carbon_field('label_best', $collection->get_id()))) { ?>
                                <div class="product__label-item product__label_best">Best seller</div>
                            <?php } ?>
                            <?php if (!empty(get_carbon_field('label_new', $collection->get_id()))) { ?>
                                <div class="product__label-item product__label_new">New</div>
                            <?php } ?>
                            <?php if (!empty(get_carbon_field('label_cotton', $collection->get_id()))) { ?>
                                <div class="product__label-item product__label_coton flex a-center">
                                    <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-coton.svg" alt="">
                                    100% cotton
                                </div>
                            <?php } ?>
                        </div>
                        <img class="collection__image" src="<?php echo get_product_image($collection); ?>" alt="<?php echo $collection->get_name(); ?>">
                        <div class="collection__inner text-center">
                            <div class="collection__title"><?php echo $collection->get_name(); ?></div>
                            <div class="collection__more more-btn">Explore the collection</div>
                        </div>
                    </a>
                    <?php } ?>
                </div>

                <!-- Show more Mobile -->
                <a href="/collections/" class="products__more more-btn more-btn_mobile">See all collections</a>

            </div>
        </section>
        <?php } ?>
    </main>
<?php get_footer(); ?>