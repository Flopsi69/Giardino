<?php
$current_page = (!empty($page) ? $page : 1);
$sort = (!empty($sort) ? $sort : 'best');
switch ($sort) {
    case 'best':
        break;
}
get_header();
?>
    <main class="main">
        <?php
        $args = array(
            'taxonomy' => array('product_cat'),
            'parent' => 0,
            'exclude' => 15
        );
        $categories = new WP_Term_Query($args);
        ?>
        <?php if (!empty($categories)) { ?>
        <!-- Categories -->
        <section class="section products-subcat">
            <div class="container products-subcat__container">
                <div class="products-subcat__list row-flex j-between">
                    <?php foreach ($categories->terms as $category) { ?>
                    <a href="<?php echo get_term_link($category); ?>" class="products-subcat__item col">
                        <div class="products-subcat__image">
                            <img src="<?php echo wp_get_attachment_image_url(get_term_meta($category->term_id, 'thumbnail_id', true), 'large') ?>" alt="<?php echo $category->name; ?>">
                        </div>
                        <div class="products-subcat__name"><?php echo $category->name; ?></div>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php } ?>

        <!-- Products -->
        <section class="section products-page">
            <div class="container">
                <div class="section__head row-flex j-between a-start">
                    <!-- Title -->
                    <h1 class="products__title section__title col">Products</h1>
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
                            <a class='sort__dropdown-link active' href="?sort=best">Recommendations</a>
                            <a class='sort__dropdown-link' href="?sort=new">New Arrivals</a>
                            <a class='sort__dropdown-link' href="?sort=asc">Price: Low to High</a>
                            <a class='sort__dropdown-link' href="?sort=desc">Price: High to Low</a>
                            <div class='sort__close-mob'>
                                <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-close.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                     <?php
                     $args = array(
                         'post_type' => 'product',
                         'posts_per_page' => 8,
                         'paged' => $current_page,
                         'post_status' => 'publish',
                         'meta_query' => array(
                             'price' => array(
                                 'key' => '_price',
                                 'value' => 0,
                                 'compare' => '>',
                                 'type' => 'DECIMAL'
                             )
                         ),
                         'orderby' => array('price' => 'DESC'),
                         'tax_query' => array(
                             array(
                                 'taxonomy' => 'product_type',
                                 'field'    => 'id',
                                 'terms'    => ['3'],
                                 'operator' => 'NOT IN'
                             )
                         )
                     );
                     $products = new WP_Query($args);
                     ?>
                    <!-- List -->
                    <?php if ($products->have_posts()) { ?>
                        <div class="products-page__list row-flex">
                        <?php foreach ($products->posts as $product) { ?>
                            <?php $product = wc_get_product($product->ID); ?>
                            <!-- Product -->
                            <div class="product products-page__item col">
                                <?php $labels = get_carbon_field('labels', $product->get_id()); ?>
                                <?php if (is_array($labels)) { ?>
                                <div class="product__label">
                                    <?php if (in_array('best', $labels)) { ?>
                                        <div class="product__label-item product__label_best">Best seller</div>
                                    <?php } ?>
                                    <?php if (in_array('new', $labels)) { ?>
                                        <div class="product__label-item product__label_new">New</div>
                                    <?php } ?>
                                    <?php if (in_array('cotton', $labels)) { ?>
                                        <div class="product__label-item product__label_coton flex a-center">
                                            <img src="<?php print get_theme_file_uri(); ?>/img/svg/icon-coton.svg" alt="">
                                            100% cotton
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                                <a href="<?php echo get_permalink($product->get_id()); ?>" class="product__preview">
                                    <img src="<?php echo get_the_post_thumbnail_url($product->get_id()); ?>" alt="<?php echo $product->get_name(); ?>">
                                </a>
                                <a href="<?php echo get_permalink($product->get_id()); ?>" class="product__name products-page__product-name"><?php echo $product->get_name(); ?></a>
                                <div class="product__descr"><?php echo $product->get_short_description(); ?></div>
                                <div class="product__price"><?php echo $product->get_price(); ?><?php echo get_woocommerce_currency_symbol(); ?></div>
                            </div>
                        <?php } ?>
                        </div>
                    <?php } ?>
                    <?php
                    $args = array(
                        'format' => '?page=%#%',
                        'current' => max(1, $current_page),
                        'total' => $products->max_num_pages,
                        'prev_next' => true,
                        'prev_text'=> 'Previous',
                        'next_text' => 'Next',
                        'type' => 'list'
                    );
                    $pagination = paginate_links($args);
                    if (!empty($pagination)) {
                        echo $pagination;
                    }
                    ?>
                </div>
        </section>
        <!-- Products -->
        <?php get_template_part('tpl/may-also-like'); ?>
    </main>
<?php get_footer(); ?>