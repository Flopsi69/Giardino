<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if (class_exists('Carbon_Fields\Container')) {

    Container::make('post_meta', 'Product description')
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('text', 'subtitle', 'Subtitle'),
            Field::make('text', 'includes', 'Includes'),
            Field::make('set', 'labels', 'Labels')
                ->set_options(array(
                    'new' => 'New',
                    'best' => 'Best seller',
                    'cotton' => '100% cotton'
                )),
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


}
