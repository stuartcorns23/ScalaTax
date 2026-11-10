<?php

/** @var \WP_Customize_Manager $wp_customize Passed in by the customize_register callback. */
$wp_customize->add_section('contact-form', array(
    'panel' => 'contact',
    'priority' => 2,
    'title' => __('Contact Form', 'scalatax'),
));

$wp_customize->add_setting("contact-form-eyebrow", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("contact-form-eyebrow-control", [
    "label" => "Eyebrow",
    "section" => "contact-form",
    "settings" => "contact-form-eyebrow",
    "type" => "text",
]);

$wp_customize->add_setting("contact-form-title", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("contact-form-title-control", [
    "label" => "Title",
    "section" => "contact-form",
    "settings" => "contact-form-title",
    "type" => "text",
]);

$wp_customize->add_setting("contact-form-description", [
    "sanitize_callback" => "sanitize_textarea_field",
]);
$wp_customize->add_control("contact-form-description-control", [
    "label" => "Description",
    "section" => "contact-form",
    "settings" => "contact-form-description",
    "type" => "textarea",
]);

// Terms allow basic HTML so they can link to a privacy policy or terms page.
$wp_customize->add_setting("contact-form-terms", [
    "sanitize_callback" => "wp_kses_post",
]);
$wp_customize->add_control("contact-form-terms-control", [
    "label" => "Terms",
    "description" => "Shown beside the consent checkbox. Links are allowed.",
    "section" => "contact-form",
    "settings" => "contact-form-terms",
    "type" => "textarea",
]);

$wp_customize->add_setting("contact-form-email", [
    "default" => get_option('admin_email'),
    "sanitize_callback" => "sanitize_email",
]);
$wp_customize->add_control("contact-form-email-control", [
    "label" => "Send Submissions To",
    "description" => "The email address that contact form submissions are sent to.",
    "section" => "contact-form",
    "settings" => "contact-form-email",
    "type" => "email",
]);
