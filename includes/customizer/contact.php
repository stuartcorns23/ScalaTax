<?php

/** @var \WP_Customize_Manager $wp_customize Passed in by the customize_register callback. */
$wp_customize->add_section('contact-header', array(
    'panel' => 'contact',
    'priority' => 1,
    'title' => __('Contact Header', 'scalatax'),
));

$wp_customize->add_setting("contact-eyebrow", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("contact-eyebrow-control", [
    "label" => "Eyebrow",
    "section" => "contact-header",
    "settings" => "contact-eyebrow",
    "type" => "text",
]);

$wp_customize->add_setting("contact-title", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("contact-title-control", [
    "label" => "Title",
    "section" => "contact-header",
    "settings" => "contact-title",
    "type" => "text",
]);

$wp_customize->add_setting("contact-description", [
    "sanitize_callback" => "sanitize_textarea_field",
]);
$wp_customize->add_control("contact-description-control", [
    "label" => "Description",
    "section" => "contact-header",
    "settings" => "contact-description",
    "type" => "textarea",
]);

$wp_customize->add_setting("contact-featured-image", [
    "sanitize_callback" => "esc_url_raw",
]);
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "contact-featured-image-control", [
    "label" => "Featured Image",
    "section" => "contact-header",
    "settings" => "contact-featured-image",
]));
