<?php
get_header();

$product = wc_get_product(get_the_ID());
if ($product->get_type() === 'grouped') {
    get_template_part('tpl/collection');
} else {
    get_template_part('tpl/product');
}

get_footer();