<?php
$product = wc_get_product(get_the_ID());
$product_parent = $product;
$category_data = get_category_data($product_parent);
?>

<main class="main">
    <!-- Products -->
    <section class="section pdp">
        <div class="container">
            <!-- About Product -->
            <div class="pdp__row">
                <?php
                $photo = get_product_image($product, 'large');
                $image_ids = $product_parent->get_gallery_image_ids();
                if (!empty($photo)) {
                ?>
                    <!-- Gallery -->
                    <div class="pdp__col pdp__col-left">
                        <div class="pdp__gallery">
                            <div class="pdp__slider pdp__slider-for">
                                <div class="pdp__slide">
                                    <img src="<?php echo $photo; ?>" alt="<?php the_title(); ?>">
                                </div>
                                <?php if (!empty($image_ids)) { ?>
                                    <?php foreach ($image_ids as $image_id) { ?>
                                        <div class="pdp__slide">
                                            <img src="<?php echo wp_get_attachment_image_url($image_id, 'large'); ?>" alt="">
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="pdp__slider pdp__slider-nav">
                                <div class="pdp__slide">
                                    <img src="<?php echo $photo; ?>" alt="<?php the_title(); ?>">
                                </div>
                                <?php if (!empty($image_ids)) { ?>
                                    <?php foreach ($image_ids as $image_id) { ?>
                                        <div class="pdp__slide">
                                            <img src="<?php echo wp_get_attachment_image_url($image_id, 'large'); ?>" alt="">
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- Control -->
                <div class="pdp__col pdp__col-right">
                    <div class="pdp-control">
                        <h1 class="pdp__title"><?php the_title(); ?></h1>
                        <div class="pdp__title-caption"><?php echo get_carbon_field('subtitle'); ?></div>
                        <?php $options = get_carbon_field('options'); ?>
                        <?php if (!empty($options)) { ?>
                            <table class="pdp-params">
                                <?php foreach ($options as $option) { ?>
                                    <?php if (!empty($option['option_key'])) { ?>
                                        <tr>
                                            <td class='pdp-params__left'><?php echo $option['option_key']; ?>:</td>
                                            <td class='pdp-params__right'><?php echo $option['option_value']; ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </table>
                        <?php } ?>

                        <?php $includes = get_carbon_field('includes'); ?>
                        <?php if (!empty($includes)) { ?>
                            <div class="pdp-include">
                                <span class="pdp-include__caption">What’s included:</span>
                                <span class="pdp-include__value"><?php echo $includes; ?></span>
                            </div>
                        <?php } ?>

                        <div class="pdp__options">
                            <div class="pdp__options-product">
                                <input type="hidden" name="product_id" value="<?php echo $product_parent->get_id(); ?>">
                                <?php $price_params[$product_parent->get_id()]['id'] = $product_parent->get_id(); ?>
                                <?php $colors = get_product_variation_colors($product); ?>
                                <?php if (!empty($colors)) { ?>
                                    <div class="pdp__color pdp-look__color pdp__option">
                                        <div class="pdp-look__caption">Color:</div>
                                        <div class="pdp-look__color-list text-center">
                                            <?php foreach ($colors as $color) { ?>
                                                <?php if (reset($colors) === $color) {
                                                    $price_params[$product->get_id()]['pa_color'] = $color['slug'];
                                                } ?>
                                                <div class="pdp-look__color-option <?php echo (reset($colors) === $color ? 'active' : ''); ?>">
                                                    <div class="pdp-look__color-preview" style="<?php echo $color['background']; ?>"></div>
                                                    <div data-key="pa_color" data-value="<?php echo $color['slug']; ?>" class="pdp-look__color-name"><?php echo $color['name']; ?></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php $attributes = get_product_attributes($product); ?>
                                <?php if (!empty($attributes)) { ?>
                                    <?php foreach ($attributes as $att_key => $attribute) { ?>
                                        <div class="pdp__size pdp__option">
                                            <div class="pdp-look__caption"><?php echo $attribute['name']; ?>:</div>
                                            <div class="pdp-look__size-list pdp__size-list">
                                                <?php if (!empty($attribute['options'])) { ?>
                                                    <div class="pdp__size-select select">
                                                        <select>
                                                            <?php foreach ($attribute['options'] as $slug => $option) { ?>
                                                                <?php if (reset($attribute['options']) === $option) {
                                                                    $price_params[$product->get_id()][$att_key] = $slug;
                                                                } ?>
                                                                <option data-key="<?php echo $att_key; ?>" data-value="<?php echo $slug; ?>" value="<?php echo $slug; ?>"><?php echo $option; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                <?php } ?>
                                                <?php if ($att_key === 'pa_size' && !empty($category_data['size_guide']) && !empty($category_data['size_guide_mobile'])) { ?>
                                                    <div data-image="<?php echo $category_data['size_guide']; ?>" data-mobile="<?php echo $category_data['size_guide_mobile']; ?>" class="pdp__guide">Size guide</div>
                                                <?php } ?>
                                                <div class="pdp-measure">
                                                    <div class="pdp-measure__btn active">cm</div>
                                                    <div class="pdp-measure__btn">inc</div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <?php $collections = get_product_collections($product); ?>
                            <?php if (!empty($collections)) { ?>
                                <?php foreach ($collections as $collection) { ?>
                                    <?php $collection_products = get_collection_products_without_current($collection, $product_parent->get_id()); ?>
                                    <?php if (!empty($collection_products)) { ?>
                                        <div class="pdp__collection">
                                            <div class="pdp__collection-head pdp__option dropdown-toggler">
                                                <div class="pdp-look__caption">COMPLETE YOUR COLLECTION "<?php echo $collection->get_name(); ?>"</div>
                                            </div>

                                            <div class="pdp__collection-body pdp__option" style='display: none;'>
                                                <?php foreach ($collection_products as $collection_product) { ?>
                                                    <?php $category_data = get_category_data($collection_product); ?>
                                                    <div class="pdp__collection-inner">
                                                        <div class="pdp__collection-row">
                                                            <label class="checkbox pdp__collection-checkbox">
                                                                <a class='pdp__collection-link' href="<?php echo get_product_url($collection_product); ?>" target='_blank'><?php echo $collection_product->get_name(); ?></a>
                                                                <input class='checkbox__input' type="checkbox">
                                                                <input type="hidden" name="product_id" value="<?php echo $collection_product->get_id(); ?>">
                                                                <?php $price_params[$collection_product->get_id()]['id'] = $collection_product->get_id(); ?>
                                                                <span class="checkbox__mark"></span>
                                                                <div class="tooltip">
                                                                    <div class="tooltip__icon">
                                                                        <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-tooltip.svg" alt="">
                                                                    </div>
                                                                    <div class="tooltip__info">
                                                                        <div class="tooltip__image">
                                                                            <img src="<?php echo get_product_image($collection_product) ?>" alt="">
                                                                        </div>
                                                                        <div class="tooltip__body">
                                                                            <table>
                                                                                <?php $includes = get_carbon_field('includes', $collection_product->get_id()); ?>
                                                                                <?php if (!empty($includes)) { ?>
                                                                                    <tr>
                                                                                        <td>What’s included:</td>
                                                                                        <td><?php echo $includes; ?></td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                                <?php $options = get_carbon_field('options'); ?>
                                                                                <?php if (!empty($options)) { ?>
                                                                                    <?php foreach ($options as $option) { ?>
                                                                                        <?php if (!empty($option['option_key'])) { ?>
                                                                                            <tr>
                                                                                                <td><?php echo $option['option_key']; ?>:</td>
                                                                                                <td><?php echo $option['option_value']; ?></td>
                                                                                            </tr>
                                                                                        <?php } ?>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                            <?php $attributes = get_product_attributes($collection_product); ?>
                                                            <?php if (!empty($attributes)) { ?>
                                                                <?php foreach ($attributes as $att_key => $attribute) { ?>
                                                                    <?php if (!empty($attribute['options'])) { ?>
                                                                        <div class="pdp__collection-size pdp__size-select select">
                                                                            <select>
                                                                                <?php foreach ($attribute['options'] as $slug => $option) { ?>
                                                                                    <?php if (reset($attribute['options']) === $option) {
                                                                                        $price_params[$collection_product->get_id()][$att_key] = $slug;
                                                                                    } ?>
                                                                                    <option data-key="<?php echo $att_key; ?>" data-value="<?php echo $slug; ?>" value="<?php echo $slug; ?>"><?php echo $option; ?></option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                        <?php if ($att_key === 'pa_size' && !empty($category_data['size_guide']) && !empty($category_data['size_guide_mobile'])) { ?>
                                                                            <div data-image="<?php echo $category_data['size_guide']; ?>" data-mobile="<?php echo $category_data['size_guide_mobile']; ?>" class="pdp__guide">Size guide</div>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php } ?>

                                                            <div class="pdp__collection-price"><?php echo get_product_by_attributes($price_params[$collection_product->get_id()])['price_with_tax']; ?><?php echo get_woocommerce_currency_symbol(); ?></div>
                                                        </div>
                                                        <?php $colors = get_product_variation_colors($collection_product); ?>
                                                        <?php if (!empty($colors)) { ?>
                                                            <div class="towel-colors">
                                                                <div class="towel-colors__caption">
                                                                    <?php echo $category_data['category_name'] ?? ''; ?> color: <span><?php echo reset($colors)['name']; ?></span>
                                                                </div>
                                                                <div class="towel-colors__list">
                                                                    <?php foreach ($colors as $variation_id => $color) { ?>
                                                                        <?php if (reset($colors) === $color) {
                                                                            $price_params[$collection_product->get_id()]['pa_color'] = $color['slug'];
                                                                        } ?>
                                                                        <div data-name="<?php echo $color['name']; ?>" data-value="<?php echo $color['slug']; ?>" data-key="pa_color" class="towel-colors__item <?php echo (reset($colors) === $color ? 'active' : ''); ?>" style="<?php echo $color['background']; ?>"></div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div>

                        <div class="pdp__price"><?php echo get_product_by_attributes($price_params[$product->get_id()])['price_with_tax']; ?><?php echo get_woocommerce_currency_symbol(); ?></div>

                        <div class="pdp__buttons row-flex">
                            <button class="btn btn_blue pdp__buttons-item col btn-to-cart">Add to CART</button>
                            <div class="pdp__buttons-divider pdp__buttons-item pdp__buttons-mob col">Or</div>
                            <button class="btn btn_trans pdp__buttons-payment pdp__buttons-item col btn-to-cart btn-to-cart_paypal"><img src="<?php print get_theme_file_uri(); ?>/img/paypal.png" alt=""></button>
                            <!-- <button class="btn btn_trans pdp__buttons-payment pdp__buttons-item pdp__buttons-mob col">
                                <img src="<?php print get_theme_file_uri(); ?>/img/applepay.png" alt=""></button> -->
                        </div>

                    </div>
                </div>
            </div>

            <!-- Info -->
            <div class="pdp__row">
                <!-- Tabs -->
                <div class="pdp__col pdp__col-left">
                    <div class="pdp-tabs">
                        <!-- Tabs Nav -->
                        <div class="pdp-tabs__nav flex">
                            <div class="pdp-tabs__nav-item pdp-subtitle active" data-tab-target='1'>Description</div>
                            <?php
                            $care_guide = get_carbon_field('care_guide');
                            if (!empty($care_guide)) {
                            ?>
                                <div class="pdp-tabs__nav-item pdp-subtitle" data-tab-target='2'>Care guide</div>
                            <?php } ?>
                        </div>
                        <!-- Tabs body -->
                        <div class="pdp-tabs__body">
                            <div class="pdp-tabs__tab pdp-text active" data-tab='1' style='display: block;'>
                                <?php the_content(); ?>
                            </div>
                            <?php if (!empty($care_guide)) { ?>
                                <div class="pdp-tabs__tab pdp-text" data-tab='2'>
                                    <?php echo get_carbon_field('care_guide'); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="pdp__col pdp__col-right">
                    <div class="pdp__delivery">
                        <div class="pdp-subtitle">Delivery & Returns</div>
                        <div class="pdp-text">
                            <?php echo carbon_get_theme_option('grd-delret-text'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Looks -->
            <?php $upsells = $product->get_upsell_ids(); ?>
            <?php $upsells += $product->get_cross_sell_ids(); ?>
            <?php if (!empty($upsells)) { ?>
                <!-- Looks -->
                <div class="pdp-look__wrap">
                    <div class="pdp-subtitle pdp-look__subtitle">Complete the look</div>

                    <!-- list -->
                    <div class="pdp-look__list">
                        <?php foreach ($upsells as $upsell_id) { ?>
                            <?php
                            $upsell = wc_get_product($upsell_id);
                            if ($upsell->get_parent_id() !== 0) {
                                $upsell = wc_get_product($upsell->get_parent_id());
                            }
                            $category_data = get_category_data($upsell);
                            ?>
                            <!-- Item -->
                            <div class="pdp-look row-flex">
                                <div class="pdp-look__preview col">
                                    <img src="<?php echo get_product_image($upsell); ?>" alt="<?php echo $upsell->get_name(); ?>">
                                    <a href="<?php echo get_product_url($upsell); ?>" class="pdp-look__preview-full">View larger</a>
                                </div>

                                <div class="pdp-look__info col">
                                    <div class="pdp-look__info-head">
                                        <a href="<?php echo get_product_url($upsell); ?>" class="pdp-look__title"><?php echo $upsell->get_name(); ?></a>

                                        <div class="pdp-look__descr"><?php echo $upsell->get_short_description(); ?></div>

                                        <div class="pdp-look__buy-price visible-md"><?php echo $upsell->get_price_including_tax(); ?><?php echo get_woocommerce_currency_symbol(); ?></div>
                                    </div>

                                    <div class="pdp-look__info-body">
                                        <input type="hidden" name="product_id" value="<?php echo $upsell->get_id(); ?>">
                                        <?php $price_params[$upsell->get_id()]['id'] = $upsell->get_id(); ?>
                                        <?php $attributes = get_product_attributes($upsell); ?>
                                        <?php if (!empty($attributes)) { ?>
                                            <?php foreach ($attributes as $att_key => $attribute) { ?>
                                                <div class="pdp-look__size">
                                                    <div class="pdp-look__caption"><?php echo $attribute['name']; ?>:</div>
                                                    <?php if (!empty($attribute['options'])) { ?>
                                                        <div class="pdp-look__size-list">
                                                            <?php foreach ($attribute['options'] as $slug => $option) { ?>
                                                                <?php if (reset($attribute['options']) === $option) {
                                                                    $price_params[$upsell->get_id()][$att_key] = $slug;
                                                                } ?>
                                                                <div data-key="<?php echo $att_key; ?>" data-value="<?php echo $slug; ?>" class="pdp-look__size-option <?php echo (reset($attribute['options']) === $option ? 'active' : ''); ?>"><?php echo $option; ?></div>
                                                            <?php } ?>
                                                            <?php if ($att_key === 'pa_size' && !empty($category_data['size_guide']) && !empty($category_data['size_guide_mobile'])) { ?>
                                                                <div data-image="<?php echo $category_data['size_guide']; ?>" data-mobile="<?php echo $category_data['size_guide_mobile']; ?>" class="pdp__guide pdp-look__size-guide">Size guide</div>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if ($upsell->get_type() === 'grouped') { ?>
                                            <?php $collection_products = get_collection_products_without_current($upsell); ?>
                                            <?php if (!empty($collection_products)) { ?>
                                                <?php foreach ($collection_products as $collection_product) { ?>
                                                    <?php $category_data = get_category_data($collection_product); ?>
                                                    <div class="pdp__collection-row">
                                                        <label class="checkbox pdp__collection-checkbox">
                                                            <a class='pdp__collection-link' href="<?php echo get_product_url($collection_product); ?>" target='_blank'><?php echo $collection_product->get_name(); ?></a>
                                                            <input class='checkbox__input' type="checkbox">
                                                            <span class="checkbox__mark"></span>
                                                            <?php $includes = get_carbon_field('includes', $collection_product->get_id()); ?>
                                                            <?php if (!empty($includes)) { ?>
                                                                <div class="tooltip">
                                                                    <div class="tooltip__icon">
                                                                        <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-tooltip.svg" alt="">
                                                                    </div>
                                                                    <div class="tooltip__info">
                                                                        <div class="tooltip__image">
                                                                            <img src="<?php echo get_product_image($collection_product) ?>" alt="">
                                                                        </div>
                                                                        <div class="tooltip__body">
                                                                            <table>
                                                                                <?php $includes = get_carbon_field('includes', $collection_product->get_id()); ?>
                                                                                <?php if (!empty($includes)) { ?>
                                                                                    <tr>
                                                                                        <td>What’s included:</td>
                                                                                        <td><?php echo $includes; ?></td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                                <?php $options = get_carbon_field('options'); ?>
                                                                                <?php if (!empty($options)) { ?>
                                                                                    <?php foreach ($options as $option) { ?>
                                                                                        <?php if (!empty($option['option_key'])) { ?>
                                                                                            <tr>
                                                                                                <td><?php echo $option['option_key']; ?>:</td>
                                                                                                <td><?php echo $option['option_value']; ?></td>
                                                                                            </tr>
                                                                                        <?php } ?>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </label>
                                                        <input type="hidden" name="product_id" value="<?php echo $collection_product->get_id(); ?>">
                                                        <?php $price_params[$collection_product->get_id()]['id'] = $collection_product->get_id(); ?>
                                                        <?php $attributes = get_product_attributes($collection_product); ?>
                                                        <?php if (!empty($attributes)) { ?>
                                                            <?php foreach ($attributes as $att_key => $attribute) { ?>
                                                                <?php if (!empty($attribute['options'])) { ?>
                                                                    <div class="pdp__collection-size pdp__size-select select">
                                                                        <select>
                                                                            <?php foreach ($attribute['options'] as $slug => $option) { ?>
                                                                                <?php if (reset($attribute['options']) === $option) {
                                                                                    $price_params[$collection_product->get_id()][$att_key] = $slug;
                                                                                } ?>
                                                                                <option data-key="<?php echo $att_key; ?>" data-value="<?php echo $slug; ?>" value="<?php echo $slug; ?>"><?php echo $option; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <?php if ($att_key === 'pa_size' && !empty($category_data['size_guide']) && !empty($category_data['size_guide_mobile'])) { ?>
                                                                        <div data-image="<?php echo $category_data['size_guide']; ?>" data-mobile="<?php echo $category_data['size_guide_mobile']; ?>" class="pdp__guide">Size guide</div>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <div class="pdp__collection-price"><?php echo get_product_by_attributes($price_params[$collection_product->get_id()])['price_with_tax']; ?><?php echo get_woocommerce_currency_symbol(); ?></div>
                                                    </div>
                                                    <?php $colors = get_product_variation_colors($collection_product); ?>
                                                    <?php if (!empty($colors)) { ?>
                                                        <div class="towel-colors">
                                                            <div class="towel-colors__caption">
                                                                <?php echo $category_data['category_name']; ?> color: <span><?php echo reset($colors)['name']; ?></span>
                                                            </div>
                                                            <div class="towel-colors__list">
                                                                <?php foreach ($colors as $variation_id => $color) { ?>
                                                                    <?php if (reset($colors) === $color) {
                                                                        $price_params[$collection_product->get_id()]['pa_color'] = $color['slug'];
                                                                    } ?>
                                                                    <div data-name="<?php echo $color['name']; ?>" data-value="<?php echo $color['slug']; ?>" data-key="pa_color" class="towel-colors__item <?php echo (reset($colors) === $color ? 'active' : ''); ?>" style="<?php echo $color['background']; ?>"></div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>

                                        <div class="pdp-look__bottom">
                                            <?php if ($upsell->get_type() === 'variable') { ?>
                                                <?php $colors = get_product_variation_colors($upsell); ?>
                                                <?php if (!empty($colors)) { ?>
                                                    <div class="pdp-look__color">
                                                        <div class="pdp-look__caption">Color:</div>
                                                        <div class="pdp-look__color-list text-center">
                                                            <?php foreach ($colors as $variation_id => $color) { ?>
                                                                <?php if (reset($colors) === $color) {
                                                                    $price_params[$upsell->get_id()]['pa_color'] = $color['slug'];
                                                                } ?>
                                                                <div class="pdp-look__color-option <?php echo (reset($colors) === $color ? 'active' : ''); ?>">
                                                                    <div class="pdp-look__color-preview" style="<?php echo $color['background']; ?>"></div>
                                                                    <div data-key="pa_color" data-value="<?php echo $color['slug']; ?>" class="pdp-look__color-name"><?php echo $color['name']; ?></div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>

                                            <div class="pdp-look__buy">
                                                <div class="pdp-look__buy-caption">QTY:</div>
                                                <div class="count">
                                                    <button class="btn count__btn count__minus">-</button>
                                                    <input class='count__value' type="number" value='1' min='1' max='1000'>
                                                    <button class="btn count__btn count__plus">+</button>
                                                </div>
                                                <div class="pdp-look__buy-price hidden-md"><?php echo get_product_by_attributes($price_params[$upsell->get_id()])['price_with_tax']; ?><?php echo get_woocommerce_currency_symbol(); ?></div>
                                                <button class="btn btn_blue pdp-look__buy-btn">Add to CART</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- Products -->
    <?php get_template_part('tpl/may-also-like'); ?>
</main>