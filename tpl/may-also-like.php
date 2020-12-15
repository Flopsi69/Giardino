<?php $products = carbon_get_theme_option('grd-ymal-products'); ?>
<?php if (!empty($products)) { ?>
<section class="section products products-slider bg-gray products-page__same">
    <div class="container">
        <div class="section__head row-flex j-between a-center">
            <!-- Title -->
            <h2 class="products__title section__title col">You may also like</h2>
        </div>
        <!-- List -->
        <div class="products__list products-slider__list">
            <?php foreach ($products as $product) { ?>
                <?php $product = wc_get_product($product['id']); ?>
                <?php if (!empty($product) && $product->get_status() === 'publish') { ?>
                <!-- Product -->
                <div class="product products-slider__item">
                    <a href="<?php echo get_product_url($product); ?>" class="product__preview">
                        <img src="<?php echo get_product_image($product); ?>" alt="<?php echo $product->get_name(); ?>">
                    </a>
                    <a href="" class="product__name"><?php echo $product->get_name(); ?></a>
                    <div class="product__descr"><?php echo $product->get_short_description(); ?></div>
                    <div class="product__price"><?php echo $product->get_price_including_tax(); ?><?php echo get_woocommerce_currency_symbol(); ?></div>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>