<?php 

$wp_customize->add_panel('branding', array(
    'title' => 'Branding',
    'priority' => 1,
));

require_once get_template_directory() . '/includes/customizer/media.php';
require_once get_template_directory() . '/includes/customizer/colours.php';

$wp_customize->add_panel('home-page', array(
    'title' => 'Home Page',
    'priority' => 2,
));

require_once get_template_directory() . '/includes/customizer/homepage.php';

$wp_customize->add_panel('services', array(
    'title' => 'Services',
    'priority' => 3,
));

require_once get_template_directory() . '/includes/customizer/services.php';

$wp_customize->add_panel('blog', array(
    'title' => 'Blog',
    'priority' => 4,
));

require_once get_template_directory() . '/includes/customizer/blog.php';

$wp_customize->add_panel('contact', array(
    'title' => 'Contact',
    'priority' => 5,
));

require_once get_template_directory() . '/includes/customizer/contact.php';
require_once get_template_directory() . '/includes/customizer/contact-form.php';

// Move WordPress's own Homepage Settings section into the Home Page panel.
// Core registers that section after this file runs, so wait until it exists.
add_action('customize_register', function ($wp_customize) {
    $homepage_settings = $wp_customize->get_section('static_front_page');
    if ($homepage_settings) {
        $homepage_settings->panel = 'home-page';
        $homepage_settings->priority = 1;
    }
}, 20);