<?php
add_theme_support('woocommerce');

add_action('init', 'start_session', 1);
function start_session() {
    if (!session_id()) {
        session_start();
    }
}

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
                            $options[$term->slug] = $term->name;
                        }
                    }
                    $values[$key] = ['name' => $name, 'options' => $options];
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

add_action('rest_api_init', function () {
    register_rest_route('giardino', '/product/', array(
        'methods' => 'GET',
        'callback' => 'get_product_by_attributes'
    ));
});
function get_product_by_attributes()
{
    if (!empty($_GET)) {
        foreach ($_GET as $key => $item) {
            $params[strval($key)] = strval($item);
        }
    }
    $product_id = intval($params['id'] ?? 0);
    if (empty($product_id)) {
        return [];
    }
    $product = wc_get_product($product_id);
    if (empty($product)) {
        return [];
    }
    if (!empty($product->get_parent_id())) {
        $product = wc_get_product($product->get_parent_id());
    }
    $availableAttributes = $product->get_attributes();
    if (!empty($availableAttributes)) {
        foreach ($availableAttributes as $key => $availableAttribute) {
            if (!empty($availableAttribute->get_variation()) && !empty($params[$key])) {
                $attributes['attribute_' . $key] = $params[$key];
            }
        }
    }
    if (!empty($attributes)) {
        $data_store = WC_Data_Store::load('product');
        $variation_id = $data_store->find_matching_product_variation(
            new \WC_Product($product), $attributes
        );
    }
    if (!empty($variation_id)) {
        $product = wc_get_product($variation_id);
    }
    return $product->get_data();
}

function get_cart_items() {
    if (function_exists('WC')) {
        $cart = WC()->cart;
        return $cart->get_cart();
    }
    return false;
}

function add_to_cart($product_id, $quantity = 1, $variation_id = false, $variation = false, $item_data = []) {
    if (function_exists('WC')) {
        $cart = WC()->cart;
        $cart->add_to_cart($product_id, $quantity, $variation_id, $variation, $item_data);
        return true;
    }
    return false;
}

function remove_from_cart($item_key) {
    if (function_exists('WC')) {
        $cart = WC()->cart;
        $cart->remove_cart_item($item_key);
        return true;
    }
    return false;
}

function change_item_cart_quantity($item_key, $quantity = 1) {
    if (function_exists('WC')) {
        $cart = WC()->cart;
        $cart->set_quantity($item_key, $quantity);
        return true;
    }
    return false;
}

function get_cart_total() {
    if (function_exists('WC')) {
        $cart = WC()->cart;
        return number_format($cart->get_total('woocommerce_cart_(__FUNCTION__)'), 2, ',', ' ');
    }
    return false;
}

function cart_control() {
    if (!empty($_POST['action'])) {
        $quantity = 1;
        $action = filter_var($_POST['action'], FILTER_SANITIZE_STRING);
        if (!empty($_POST['data'])) {
            foreach ($_POST['data'] as $value) {
                if ($value['name'] === 'product_id' || $value['name'] === 'item_key' || $value['name'] === 'quantity' || $value['name'] === 'variation_id') {
                    ${$value['name']} = filter_var($value['value'], FILTER_SANITIZE_STRING);
                } else {
                    $data[filter_var($value['name'], FILTER_SANITIZE_STRING)] = filter_var($value['value'], FILTER_SANITIZE_STRING);
                }
            }
        }
        if (isset($action)) {
            switch ($action) {
                case 'add':
                    if (isset($product_id)) {
                        add_to_cart($product_id, $quantity, $variation_id ?? false, false, $data ?? false);
                    }
                    break;
                case 'change':
                    if (isset($item_key)) {
                        change_item_cart_quantity($item_key, $quantity);
                    }
                    break;
                case 'remove':
                    if (isset($item_key)) {
                        remove_from_cart($item_key);
                    }
                    break;
            }
        }
    }
    return false;
}
