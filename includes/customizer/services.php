<?php

/** @var \WP_Customize_Manager $wp_customize Passed in by the customize_register callback. */
$wp_customize->add_section('services-header', array(
    'panel' => 'services',
    'priority' => 1,
    'title' => __('Services Header', 'scalatax'),
));

$wp_customize->add_setting("services-eyebrow", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("services-eyebrow-control", [
    "label" => "Eyebrow",
    "section" => "services-header",
    "settings" => "services-eyebrow",
    "type" => "text",
]);

$wp_customize->add_setting("services-title", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("services-title-control", [
    "label" => "Title",
    "section" => "services-header",
    "settings" => "services-title",
    "type" => "text",
]);

$wp_customize->add_setting("services-description", [
    "sanitize_callback" => "sanitize_textarea_field",
]);
$wp_customize->add_control("services-description-control", [
    "label" => "Description",
    "section" => "services-header",
    "settings" => "services-description",
    "type" => "textarea",
]);

$wp_customize->add_setting("services-featured-image", [
    "sanitize_callback" => "esc_url_raw",
]);
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "services-featured-image-control", [
    "label" => "Featured Image",
    "section" => "services-header",
    "settings" => "services-featured-image",
]));
