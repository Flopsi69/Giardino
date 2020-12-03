<?php /* Template Name: Collections */ ?>
<?php get_header(); ?>
    <main class="main">
        <!-- Collections -->
        <section class="section collections-page">
            <div class="container">
                <div class="section__head row-flex j-between a-center">
                    <!-- Title -->
                    <h2 class="products__title section__title col">Explore by COLLECTION</h2>
                </div>

                <!-- List -->
                <?php $collections = get_product_collections(0); ?>
                <?php if (!empty($collections)) { ?>
                <div class="collections__list row-flex">
                    <!-- Collection -->
                    <?php foreach ($collections as $collection) { ?>
                    <a href="<?php echo get_product_url($collection); ?>" class="collection collections__item col">
                        <?php $labels = get_carbon_field('labels', $collection->get_id()); ?>
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
                        <img class="collection__image" src="<?php echo get_product_image($collection); ?>" alt="<?php echo $collection->get_name(); ?>">
                        <div class="collection__inner text-center">
                            <div class="collection__title"><?php echo $collection->get_name(); ?></div>
                            <div class="collection__more more-btn">Explore the collection</div>
                        </div>
                    </a>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </section>
        <!-- Products -->
        <?php get_template_part('tpl/may-also-like'); ?>
    </main>
<?php get_footer(); ?>