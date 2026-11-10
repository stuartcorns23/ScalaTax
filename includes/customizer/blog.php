<?php

/** @var \WP_Customize_Manager $wp_customize Passed in by the customize_register callback. */
$wp_customize->add_section('blog-header', array(
    'panel' => 'blog',
    'priority' => 1,
    'title' => __('Blog Header', 'scalatax'),
));

$wp_customize->add_setting("blog-eyebrow", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("blog-eyebrow-control", [
    "label" => "Eyebrow",
    "section" => "blog-header",
    "settings" => "blog-eyebrow",
    "type" => "text",
]);

$wp_customize->add_setting("blog-title", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("blog-title-control", [
    "label" => "Title",
    "section" => "blog-header",
    "settings" => "blog-title",
    "type" => "text",
]);

$wp_customize->add_setting("blog-description", [
    "sanitize_callback" => "sanitize_textarea_field",
]);
$wp_customize->add_control("blog-description-control", [
    "label" => "Description",
    "section" => "blog-header",
    "settings" => "blog-description",
    "type" => "textarea",
]);

$wp_customize->add_setting("blog-featured-image", [
    "sanitize_callback" => "esc_url_raw",
]);
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "blog-featured-image-control", [
    "label" => "Featured Image",
    "section" => "blog-header",
    "settings" => "blog-featured-image",
]));

$wp_customize->add_section('blog-listing', array(
    'panel' => 'blog',
    'priority' => 2,
    'title' => __('Blog Listing', 'scalatax'),
));

$wp_customize->add_setting("blog-posts-per-page", [
    "default" => get_option('posts_per_page'),
    "sanitize_callback" => "absint",
]);
$wp_customize->add_control("blog-posts-per-page-control", [
    "label" => "Articles per page",
    "description" => "How many articles show on the blog, category and search pages before paging.",
    "section" => "blog-listing",
    "settings" => "blog-posts-per-page",
    "type" => "number",
    "input_attrs" => [
        "min" => 1,
        "max" => 50,
        "step" => 1,
    ],
]);
