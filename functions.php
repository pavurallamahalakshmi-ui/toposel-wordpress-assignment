<?php
// Theme Setup
function toposel_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'toposel_theme_setup');

// Enqueue Styles
function toposel_enqueue_styles() {
    wp_enqueue_style('toposel-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'toposel_enqueue_styles');

// ACF Fields Registration
function toposel_register_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_homepage',
            'title' => 'Homepage Settings',
            'fields' => array(
                array(
                    'key' => 'field_announcement_text',
                    'label' => 'Announcement Bar Text',
                    'name' => 'announcement_text',
                    'type' => 'text',
                    'default_value' => 'Sign up and get 20% off your first order!',
                ),
                array(
                    'key' => 'field_hero_image',
                    'label' => 'Hero Banner Image',
                    'name' => 'hero_image',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key' => 'field_hero_heading',
                    'label' => 'Hero Heading',
                    'name' => 'hero_heading',
                    'type' => 'text',
                    'default_value' => 'New Collection 2024',
                ),
                array(
                    'key' => 'field_hero_subheading',
                    'label' => 'Hero Subheading',
                    'name' => 'hero_subheading',
                    'type' => 'text',
                    'default_value' => 'Discover the latest trends',
                ),
                array(
                    'key' => 'field_hero_button_text',
                    'label' => 'Hero Button Text',
                    'name' => 'hero_button_text',
                    'type' => 'text',
                    'default_value' => 'Shop Now',
                ),
                array(
                    'key' => 'field_hero_button_link',
                    'label' => 'Hero Button Link',
                    'name' => 'hero_button_link',
                    'type' => 'url',
                    'default_value' => 'http://toposel.local',
                ),
                array(
                    'key' => 'field_brand_logos',
                    'label' => 'Brand Logos',
                    'name' => 'brand_logos',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'button_label' => 'Add Brand Logo',
                    'min' => 0,
                    'max' => 10,
                    'sub_fields' => array(
                        array(
                            'key' => 'field_brand_logo_image',
                            'label' => 'Brand Logo Image',
                            'name' => 'brand_logo',
                            'type' => 'image',
                            'return_format' => 'url',
                            'preview_size' => 'thumbnail',
                        ),
                        array(
                            'key' => 'field_brand_name',
                            'label' => 'Brand Name',
                            'name' => 'brand_name',
                            'type' => 'text',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_new_arrivals_category',
                    'label' => 'New Arrivals Category',
                    'name' => 'new_arrivals_category',
                    'type' => 'number',
                    'instructions' => 'Enter WooCommerce Category ID',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_type',
                        'operator' => '==',
                        'value' => 'front_page',
                    ),
                ),
            ),
        ));
    }
}
add_action('acf/init', 'toposel_register_acf_fields');