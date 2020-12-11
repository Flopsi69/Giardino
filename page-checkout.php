<?php get_header(); ?>
    <main class="main">
        <section class="section text-page">
            <div class="container">
                <?php if (!(is_page('checkout') && !empty(is_wc_endpoint_url('order-received')))) { ?>
                <!-- Head -->
                <div class="checkout__head flex a-center j-between">
                    <?php $cart_items = get_cart_items(); ?>
                    <?php if (!empty($cart_items)) { ?>
                        <div class="checkout__orders orders">
                            <div class="orders__head">
                                <!-- Toggler -->
                                <div class="orders__toggler dropdown-toggler flex a-center">
                                    <div class="orders__caption">Show Order Summary:</div>
                                    <div class="orders__value">
                                        <?php echo get_cart_total(); ?><?php echo get_woocommerce_currency_symbol(); ?>
                                    </div>
                                </div>

                                <!-- Popup -->
                                <div class="orders-popup">
                                    <!-- Order -->
                                    <div class="orders-popup__list">
                                        <?php foreach ($cart_items as $item) { ?>
                                            <?php $product = $item['data']; ?>
                                            <div class="orders-popup__order">
                                                <!-- Image -->
                                                <a href="<?php echo get_permalink($product->get_id()); ?>" class="orders-popup__order-image">
                                                    <img src="<?php echo get_product_image($product); ?>" alt="">
                                                </a>
                                                <!-- Info -->
                                                <div class="orders-popup__order-info">
                                                    <a href="<?php echo get_permalink($product->get_id()); ?>" class="orders-popup__order-title"><?php echo $product->get_name(); ?></a>
                                                    <div class="orders-popup__order-params flex a-end j-between">
                                                        <div class="orders-popup__order-options">
                                                            <?php $attributes = get_product_attributes($product); ?>
                                                            <?php if (!empty($attributes)) { ?>
                                                                <?php foreach ($attributes as $att_key => $attribute) { ?>
                                                                    <?php if (!empty($attribute['options'])) { ?>
                                                                        <?php foreach ($attribute['options'] as $slug => $option) { ?>
                                                                            <?php if ($item[$att_key] === $slug) { ?>
                                                                                <div class="orders-popup__order-option"><?php echo $attribute['name']; ?> <?php echo $option; ?></div>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                            <?php $colors = get_product_variation_colors($product); ?>
                                                            <?php if (!empty($colors)) { ?>
                                                                <?php foreach ($colors as $variation_id => $color) { ?>
                                                                    <?php if ($item['pa_color'] === $color['slug']) { ?>
                                                                        <div class="orders-popup__order-option">Color: <?php echo $color['name']; ?></div>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                            <div class="orders-popup__order-option">Qty: <?php echo $item['quantity']; ?></div>
                                                        </div>
                                                        <div class="orders-popup__order-price">
                                                            <?php echo $item['line_total']; ?><?php echo get_woocommerce_currency_symbol(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <!-- Prices -->
                                    <div class="orders-popup__prices">
                                        <div class="orders-popup__row row-flex j-between">
                                            <div class="orders-popup__key col">Subtotal</div>
                                            <div class="orders-popup__value col">
                                                <?php echo get_items_total(); ?><?php echo get_woocommerce_currency_symbol(); ?>
                                            </div>
                                        </div>
                                        <div class="orders-popup__row row-flex j-between">
                                            <div class="orders-popup__key col">Shipping</div>
                                            <div class="orders-popup__value col"><?php echo get_shipping_total(); ?><?php echo get_woocommerce_currency_symbol(); ?></div>
                                        </div>
                                        <div class="orders-popup__row row-flex j-between">
                                            <div class="orders-popup__key col">Tax</div>
                                            <?php $total_tax = get_tax_total(); ?>
                                            <div class="orders-popup__value col"><?php if ($total_tax > 0) { echo $total_tax . get_woocommerce_currency_symbol(); } else { ?>Calculated at next step<?php } ?></div>
                                        </div>
                                    </div>

                                    <!-- Total -->
                                    <div class="orders-popup__total">
                                        <div class="orders-popup__row row-flex j-between">
                                            <div class="orders-popup__key col">Total</div>
                                            <div class="orders-popup__value orders-popup__total-price col">
                                                <?php echo get_cart_total(); ?><?php echo get_woocommerce_currency_symbol(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <h1><?php the_title(); ?></h1>
                <?php } ?>
                <?php the_content(); ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>