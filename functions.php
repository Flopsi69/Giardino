<?php
add_theme_support('woocommerce');

add_action('carbon_fields_register_fields', 'register_custom_fields');
function register_custom_fields() {
    require_once 'inc/carbon_fields.php';
}

add_filter('query_vars', 'add_query_vars_filter');
function add_query_vars_filter($vars){
    $vars[] = "sort";
    return $vars;
}

function get_carbon_field($name, $id = false) {
    if (!empty($id)) {
        $field = carbon_get_post_meta($id, $name);
    } else {
        $field = carbon_get_the_post_meta($name);
    }
    if (!empty($field)) {
        return $field;
    }
    return '';
}

function get_product_attributes($product) {
    if ($product->get_parent_id() !== 0) {
        $product = wc_get_product($product->get_parent_id());
    }
    $attributes = $product->get_attributes();
    if ($attributes) {
        foreach ($attributes as $key => $attribute) {
            $options = [];
            $name = '';
            if ($attribute->get_visible() && $key !== 'pa_color') {
                $terms = wc_get_product_terms($product->get_id(), $key, array('fields' => 'all'));
                if (!empty($terms)) {
                    if ($terms) {
                        $name = get_taxonomy($key)->labels->singular_name;
                        foreach ($terms as $term) {
                            $options[] = $term->name;
                        }
                    }
                    $values[mb_substr($key, 3)] = ['name' => $name, 'options' => $options];
                } else {
                    $values[$key] = ['name' => $attribute->get_name(), 'options' => $attribute->get_options()];
                }
            }
        }
    }
    return $values ?? [];
}

function get_product_variation_colors($product) {
    if ($product->get_parent_id() !== 0) {
        $product = wc_get_product($product->get_parent_id());
    }
    $terms = wc_get_product_terms($product->get_id(), 'pa_color', array('fields' => 'all'));

//    $match_attributes =  array(
//        "attribute_pa_color" => 'white',
//    );
//
//    $data_store   = WC_Data_Store::load( 'product' );
//    $variation_id = $data_store->find_matching_product_variation(
//        new \WC_Product( $product),$match_attributes
//    );
//    print_r($variation_id);

    if (!empty($terms)) {
        if ($terms) {
            $name = get_taxonomy('pa_color')->labels->singular_name;
            foreach ($terms as $key => $term) {
                $data[$key] = array(
                    'name' => $term->name,
                    'slug' => $term->slug,
                    'type' => carbon_get_term_meta($term->term_id, 'type'),
                    'hex' => carbon_get_term_meta($term->term_id, 'color_hex'),
                    'image' =>  wp_get_attachment_image_url(carbon_get_term_meta($term->term_id, 'color_image'), 'thumbnail'),
                    'background' => ''
                );
                switch ($data[$key]['type']) {
                    case 'hex':
                        $data[$key]['background'] = "background-color: " . $data[$key]['hex'] . ";";
                        break;
                    case 'image':
                        $data[$key]['background'] = "background-image: url(" . $data[$key]['image'] . ");";
                        break;
                }
            }
        }
    }
    return $data ?? [];
}

function get_product_collections($product, $limit = -1) {
    $product_id = $product;
    if (is_object($product)) {
        $product_id = $product->get_id();
        if ($product->get_parent_id() !== 0) {
            $product_id = $product->get_parent_id();
        }
    }
    $parents = get_parent_grouped_post($product_id, $limit);
    if (!empty($parents)) {
        foreach ($parents as $parent) {
            $collections[] = wc_get_product($parent->ID);
        }
    }
    return $collections ?? [];
}

function get_parent_grouped_post($children_id, $limit = -1){
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_type',
                'field'    => 'id',
                'terms'    => '3'
            )
        ),
        'meta_query' => array(
            array(
                'key' => '_children',
                'value' => strval($children_id),
                'compare' => 'LIKE'
            )
        )
    );
    $products = new WP_Query($args);
    if ($products->have_posts()) {
        return $products->posts;
    }
    return [];
}

function get_collection_products_without_current($collection, $without_id = 0) {
    $products_ids = $collection->get_children();
    if (!empty($products_ids)) {
        foreach ($products_ids as $product_id) {
            if (intval($without_id) !== intval($product_id)) {
                $products[] = wc_get_product($product_id);
            }
        }
    }
    return $products ?? [];
}