<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if (class_exists('Carbon_Fields\Container')) {

    Container::make('post_meta', 'Product description')
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('text', 'subtitle', 'Subtitle')
                ->set_default_value('Designed in Monte-Carlo, Monaco'),
            Field::make('text', 'includes', 'Includes'),
            Field::make('separator', 'labels-separator', 'Labels'),
            Field::make('checkbox', 'label_new', 'New')
                ->set_option_value('new'),
            Field::make('checkbox', 'label_best', 'Best seller')
                ->set_option_value('best'),
            Field::make('checkbox', 'label_cotton', '100% cotton')
                ->set_option_value('cotton'),
            Field::make('complex', 'options', 'Options')
                ->add_fields('item', array(
                    Field::make('text', 'option_key', 'Name'),
                    Field::make('text', 'option_value', 'Value'),
                )),
            Field::make('rich_text', 'care_guide', 'Care Guide')
        ));

    Container::make('term_meta', 'Color option')
        ->where('term_taxonomy', '=', 'pa_color')
        ->add_fields(array(
            Field::make('radio', 'type', 'Color type')
                ->set_options(array(
                    'hex' => 'RGB color',
                    'image' => 'Image'
                )),
            Field::make('color', 'color_hex', 'Color')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'type',
                        'value' => 'hex',
                        'compare' => '='
                    )
                )),
            Field::make('image', 'color_image', 'Image')
                ->set_conditional_logic(array(
                    'relation' => 'AND',
                    array(
                        'field' => 'type',
                        'value' => 'image',
                        'compare' => '='
                    )
                ))
        ));

    Container::make('term_meta', 'Category')
        ->where('term_taxonomy', '=', 'product_cat')
        ->add_fields(array(
            Field::make('image', 'size_guide', 'Size guide')
                ->set_help_text('for desktop')
                ->set_classes('size-guide'),
            Field::make('image', 'size_guide_mobile', '')
                ->set_help_text('for mobile')
                ->set_classes('size-guide-mobile'),
        ));

    $options = Container::make('theme_options', ('Giardino'))
        ->set_page_file('giardino')
        ->set_page_menu_position(2)
        ->set_icon('dashicons-edit')
        ->add_fields(array(
            Field::make('separator', 'grd-frontpage-hero-separator', 'Front page setting'),
            Field::make('text', 'grd-frontpage-hero-title', 'Title'),
            Field::make('text', 'grd-frontpage-hero-subtitle', 'Subtitle'),
            Field::make('text', 'grd-frontpage-hero-category-button-title', 'Category Button title'),
            Field::make('text', 'grd-frontpage-hero-category-button-link', 'Category Button link'),
            Field::make('text', 'grd-frontpage-hero-collection-button-title', 'Collection Button title'),
            Field::make('text', 'grd-frontpage-hero-collection-button-link', 'Collection Button link'),

        ));
    $args = array(
        'taxonomy' => array('product_cat'),
        'parent' => 0,
        'hide_empty' => true,
        'exclude' => 15
    );
    $categories = new WP_Term_Query($args);
    if (!empty($categories)) {
        foreach ($categories->terms as $category) {
            $options->add_fields(array(
                Field::make('association', 'fronpage-cat-' . $category->term_id . '-products', $category->name . ' products')
                    ->set_types(array(
                        array(
                            'type' => 'post',
                            'post_type' => 'product'
                        )
                    ))
                    ->set_duplicates_allowed(false)
            ));
            $filter_name = 'carbon_fields_association_field_options_fronpage-cat-' . $category->term_id . '-products_post_product';
            add_filter($filter_name, function ($args) use ($category) {
                $args['tax_query'] = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => $category->term_id,
                        'include_children' => false
                    )
                );
                return $args;
            });
        }
    }



    $options->add_fields(array(
        Field::make('separator', 'grd-ymal-separate', 'You may also like'),
        Field::make('association', 'grd-ymal-products', 'Products')
            ->set_types(array(
                array(
                    'type' => 'post',
                    'post_type' => 'product',
                )
            ))
            ->set_duplicates_allowed(false),
        Field::make('separator', 'grd-delret-separate', 'Delivery & returns'),
        Field::make('rich_text', 'grd-delret-text', 'Text')
    ));
}
