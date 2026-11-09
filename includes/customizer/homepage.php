<?php

/** @var \WP_Customize_Manager $wp_customize Passed in by the customize_register callback. */
$wp_customize->add_section('header-hero', array(
    'panel' => 'home-page',
    'priority' => 2,
    'title' => __('Header Hero', 'scalatax'),
));

$wp_customize->add_setting("hero-eyebrow", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("hero-eyebrow-control", [
    "label" => "Eyebrow",
    "section" => "header-hero",
    "settings" => "hero-eyebrow",
    "type" => "text",
]);

$wp_customize->add_setting("hero-title", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("hero-title-control", [
    "label" => "Title",
    "section" => "header-hero",
    "settings" => "hero-title",
    "type" => "text",
]);

$wp_customize->add_setting("hero-description", [
    "sanitize_callback" => "sanitize_textarea_field",
]);
$wp_customize->add_control("hero-description-control", [
    "label" => "Description",
    "section" => "header-hero",
    "settings" => "hero-description",
    "type" => "textarea",
]);

$wp_customize->add_setting("hero-image");
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "hero-image-control", [
    "label" => "Image",
    "section" => "header-hero",
    "settings" => "hero-image",
]));

foreach ([1 => 'Primary', 2 => 'Secondary'] as $number => $name) {
    $wp_customize->add_setting("hero-link-$number-separator");
    $wp_customize->add_control(new Separator_Custom_Control($wp_customize, "hero-link-$number-separator-control", [
        "section" => "header-hero",
        "settings" => "hero-link-$number-separator",
    ]));

    $wp_customize->add_setting("hero-link-$number-text", [
        "sanitize_callback" => "sanitize_text_field",
    ]);
    $wp_customize->add_control("hero-link-$number-text-control", [
        "label" => "$name Link Text",
        "section" => "header-hero",
        "settings" => "hero-link-$number-text",
        "type" => "text",
    ]);

    $wp_customize->add_setting("hero-link-$number-url", [
        "sanitize_callback" => "esc_url_raw",
    ]);
    $wp_customize->add_control("hero-link-$number-url-control", [
        "label" => "$name Link URL",
        "section" => "header-hero",
        "settings" => "hero-link-$number-url",
        "type" => "url",
    ]);
}

$wp_customize->add_section('icon-groups', array(
    'panel' => 'home-page',
    'priority' => 3,
    'title' => __('Icon Groups', 'scalatax'),
));

for ($number = 1; $number <= 4; $number++) {
    if ($number > 1) {
        $wp_customize->add_setting("icon-group-$number-separator");
        $wp_customize->add_control(new Separator_Custom_Control($wp_customize, "icon-group-$number-separator-control", [
            "section" => "icon-groups",
            "settings" => "icon-group-$number-separator",
        ]));
    }

    $wp_customize->add_setting("icon-group-$number-icon");
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "icon-group-$number-icon-control", [
        "label" => "Group $number Icon",
        "section" => "icon-groups",
        "settings" => "icon-group-$number-icon",
    ]));

    $wp_customize->add_setting("icon-group-$number-title", [
        "sanitize_callback" => "sanitize_text_field",
    ]);
    $wp_customize->add_control("icon-group-$number-title-control", [
        "label" => "Group $number Title",
        "section" => "icon-groups",
        "settings" => "icon-group-$number-title",
        "type" => "text",
    ]);

    $wp_customize->add_setting("icon-group-$number-description", [
        "sanitize_callback" => "sanitize_textarea_field",
    ]);
    $wp_customize->add_control("icon-group-$number-description-control", [
        "label" => "Group $number Description",
        "section" => "icon-groups",
        "settings" => "icon-group-$number-description",
        "type" => "textarea",
    ]);
}

$wp_customize->add_section('service-area', array(
    'panel' => 'home-page',
    'priority' => 4,
    'title' => __('Service Area', 'scalatax'),
));

$wp_customize->add_setting("service-area-eyebrow", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("service-area-eyebrow-control", [
    "label" => "Eyebrow",
    "section" => "service-area",
    "settings" => "service-area-eyebrow",
    "type" => "text",
]);

$wp_customize->add_setting("service-area-title", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("service-area-title-control", [
    "label" => "Title",
    "section" => "service-area",
    "settings" => "service-area-title",
    "type" => "text",
]);

$wp_customize->add_setting("service-area-description", [
    "sanitize_callback" => "sanitize_textarea_field",
]);
$wp_customize->add_control("service-area-description-control", [
    "label" => "Description",
    "section" => "service-area",
    "settings" => "service-area-description",
    "type" => "textarea",
]);

$wp_customize->add_setting("service-area-image");
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "service-area-image-control", [
    "label" => "Image",
    "section" => "service-area",
    "settings" => "service-area-image",
]));

$wp_customize->add_setting("service-area-video", [
    "sanitize_callback" => "absint",
]);
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "service-area-video-control", [
    "label" => "Video",
    "section" => "service-area",
    "settings" => "service-area-video",
    "mime_type" => "video",
]));

$service_choices = [0 => '— Select a service —'];
foreach (get_posts(['post_type' => 'service', 'numberposts' => -1, 'orderby' => 'title', 'order' => 'ASC']) as $service) {
    $service_choices[$service->ID] = $service->post_title;
}

$wp_customize->add_setting("service-area-separator");
$wp_customize->add_control(new Separator_Custom_Control($wp_customize, "service-area-separator-control", [
    "section" => "service-area",
    "settings" => "service-area-separator",
]));

for ($number = 1; $number <= 3; $number++) {
    $wp_customize->add_setting("service-area-service-$number", [
        "default" => 0,
        "sanitize_callback" => "absint",
    ]);
    $wp_customize->add_control("service-area-service-$number-control", [
        "label" => "Service $number",
        "section" => "service-area",
        "settings" => "service-area-service-$number",
        "type" => "select",
        "choices" => $service_choices,
    ]);
}
    // Article Content Section

    $wp_customize->add_section('article-content', array(
        'panel' => 'home-page',
        'priority' => 5,
        'title' => __('Article Content', 'scalatax'),
    ));

    $wp_customize->add_setting("article-content-eyebrow", [
        "sanitize_callback" => "sanitize_text_field",
    ]);
    $wp_customize->add_control("article-content-eyebrow-control", [
        "label" => "Eyebrow",
        "section" => "article-content",
        "settings" => "article-content-eyebrow",
        "type" => "text",
    ]);

    $wp_customize->add_setting("article-content-title", [
        "sanitize_callback" => "sanitize_text_field",
    ]);
    $wp_customize->add_control("article-content-title-control", [
        "label" => "Title",
        "section" => "article-content",
        "settings" => "article-content-title",
        "type" => "text",
    ]);

    $wp_customize->add_setting("article-content-description", [
        "sanitize_callback" => "sanitize_textarea_field",
    ]);
    $wp_customize->add_control("article-content-description-control", [
        "label" => "Description",
        "section" => "article-content",
        "settings" => "article-content-description",
        "type" => "textarea",
    ]);

    $wp_customize->add_setting("article-content-image");
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "article-content-image-control", [
        "label" => "Image",
        "section" => "article-content",
        "settings" => "article-content-image",
    ]));

    $wp_customize->add_setting("article-content-link-text", [
        "sanitize_callback" => "sanitize_text_field",
    ]);
    $wp_customize->add_control("article-content-link-text-control", [
        "label" => "Link Text",
        "section" => "article-content",
        "settings" => "article-content-link-text",
        "type" => "text",
    ]);

    $wp_customize->add_setting("article-content-link-url", [
        "sanitize_callback" => "esc_url_raw",
    ]);
    $wp_customize->add_control("article-content-link-url-control", [
        "label" => "Link URL",
        "section" => "article-content",
        "settings" => "article-content-link-url",
        "type" => "url",
    ]);

    for ($number = 1; $number <= 4; $number++) {
        $wp_customize->add_setting("article-content-point-$number-separator");
        $wp_customize->add_control(new Separator_Custom_Control($wp_customize, "article-content-point-$number-separator-control", [
            "section" => "article-content",
            "settings" => "article-content-point-$number-separator",
        ]));

        $wp_customize->add_setting("article-content-point-$number-title", [
            "sanitize_callback" => "sanitize_text_field",
        ]);
        $wp_customize->add_control("article-content-point-$number-title-control", [
            "label" => "Point $number Title",
            "section" => "article-content",
            "settings" => "article-content-point-$number-title",
            "type" => "text",
        ]);

        $wp_customize->add_setting("article-content-point-$number-description", [
            "sanitize_callback" => "sanitize_textarea_field",
        ]);
        $wp_customize->add_control("article-content-point-$number-description-control", [
            "label" => "Point $number Description",
            "section" => "article-content",
            "settings" => "article-content-point-$number-description",
            "type" => "textarea",
        ]);
    }
    // End of Article Content

    // Article Area Section

$wp_customize->add_section('article-area', array(
    'panel' => 'home-page',
    'priority' => 6,
    'title' => __('Article Area', 'scalatax'),
));

$wp_customize->add_setting("article-area-eyebrow", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("article-area-eyebrow-control", [
    "label" => "Eyebrow",
    "section" => "article-area",
    "settings" => "article-area-eyebrow",
    "type" => "text",
]);

$wp_customize->add_setting("article-area-title", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("article-area-title-control", [
    "label" => "Title",
    "section" => "article-area",
    "settings" => "article-area-title",
    "type" => "text",
]);

$wp_customize->add_setting("article-area-description", [
    "sanitize_callback" => "sanitize_textarea_field",
]);
$wp_customize->add_control("article-area-description-control", [
    "label" => "Description",
    "section" => "article-area",
    "settings" => "article-area-description",
    "type" => "textarea",
]);

$wp_customize->add_setting("article-area-post-count", [
    "default" => 3,
    "sanitize_callback" => "absint",
]);
$wp_customize->add_control("article-area-post-count-control", [
    "label" => "Number of Posts",
    "section" => "article-area",
    "settings" => "article-area-post-count",
    "type" => "number",
    "input_attrs" => [
        "min" => 1,
        "max" => 12,
        "step" => 1,
    ],
]);

$wp_customize->add_section('footer-hero', array(
    'panel' => 'home-page',
    'priority' => 7,
    'title' => __('Footer Hero', 'scalatax'),
));

$wp_customize->add_setting("footer-hero-title", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("footer-hero-title-control", [
    "label" => "Title",
    "section" => "footer-hero",
    "settings" => "footer-hero-title",
    "type" => "text",
]);

$wp_customize->add_setting("footer-hero-description", [
    "sanitize_callback" => "sanitize_textarea_field",
]);
$wp_customize->add_control("footer-hero-description-control", [
    "label" => "Description",
    "section" => "footer-hero",
    "settings" => "footer-hero-description",
    "type" => "textarea",
]);

$wp_customize->add_setting("footer-hero-button-text", [
    "sanitize_callback" => "sanitize_text_field",
]);
$wp_customize->add_control("footer-hero-button-text-control", [
    "label" => "Button Text",
    "section" => "footer-hero",
    "settings" => "footer-hero-button-text",
    "type" => "text",
]);

$wp_customize->add_setting("footer-hero-button-url", [
    "sanitize_callback" => "esc_url_raw",
]);
$wp_customize->add_control("footer-hero-button-url-control", [
    "label" => "Button Link",
    "section" => "footer-hero",
    "settings" => "footer-hero-button-url",
    "type" => "url",
]);
