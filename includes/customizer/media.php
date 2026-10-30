<?php 

$wp_customize->add_section('logos', array(
    'panel' => 'branding',
    'priority' => 1,
    'title' => __('Logo', 'PartyAngels2026'),
));

$wp_customize->add_setting("website-logo");
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "website-logo-control", [
    "label" => "Website Logo",
    "section" => "logos",
    "settings" => "website-logo",
]));

$wp_customize->add_setting("website-icon");
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "website-icon-control", [
    "label" => "Icon",
    "section" => "logos",
    "settings" => "website-icon",
    "width" => 1080,
    "height" => 1080,
]));

$wp_customize->add_setting("dark-logo");
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "dark-logo-control", [
    "label" => "Logo (Dark Theme)",
    "section" => "logos",
    "settings" => "dark-logo",
    "width" => 1080,
    "height" => 1080,
]));