<?php

$wp_customize->add_section('colour-scheme', array(
    'panel' => 'branding',
    'priority' => 2,
    'title' => __('Colour Scheme', 'scalatax'),
));

foreach (scalatax_colour_scheme() as $variable => $colour) {
    $wp_customize->add_setting("colour-$variable", [
        "default" => $colour['default'],
        "sanitize_callback" => "sanitize_hex_color",
    ]);
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "colour-$variable-control", [
        "label" => $colour['label'],
        "description" => "--$variable",
        "section" => "colour-scheme",
        "settings" => "colour-$variable",
    ]));
}
