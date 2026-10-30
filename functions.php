<?php 

function scalatax_load_assets() {
    $js_path = get_theme_file_path('/build/index.js');
    $css_path = get_theme_file_path('/build/index.css');

    wp_enqueue_script('ourmainjs', get_theme_file_uri('/build/index.js'), array('wp-element', 'react-jsx-runtime'), file_exists($js_path) ? filemtime($js_path) : '1.0', true);
    wp_enqueue_style('ourmaincss', get_theme_file_uri('/build/index.css'), array(), file_exists($css_path) ? filemtime($css_path) : '1.0');
    wp_enqueue_style('MaterialIcons', "https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100&icon_names=call,home,mail,search");
}

add_action('wp_enqueue_scripts', 'scalatax_load_assets');

// CSS custom properties editable under Branding → Colour Scheme. Defaults match :root in src/index.css
function scalatax_colour_scheme() {
    return array(
        'primary-color'         => array('label' => 'Primary', 'default' => '#809b76'),
        'primary-color-dark'    => array('label' => 'Primary (Dark)', 'default' => '#617d58'),
        'primary-color-light'   => array('label' => 'Primary (Light)', 'default' => '#edf2e9'),
        'secondary-color'       => array('label' => 'Secondary', 'default' => '#142e45'),
        'secondary-color-dark'  => array('label' => 'Secondary (Dark)', 'default' => '#142e45'),
        'secondary-color-light' => array('label' => 'Secondary (Light)', 'default' => '#203d54'),
        'body-text'             => array('label' => 'Body Text', 'default' => '#344657'),
        'navy'                  => array('label' => 'Navy', 'default' => '#142e45'),
        'navy-light'            => array('label' => 'Navy (Light)', 'default' => '#203d54'),
        'sage'                  => array('label' => 'Sage', 'default' => '#809b76'),
        'sage-dark'             => array('label' => 'Sage (Dark)', 'default' => '#617d58'),
        'sage-light'            => array('label' => 'Sage (Light)', 'default' => '#edf2e9'),
        'cream'                 => array('label' => 'Cream', 'default' => '#fafaf6'),
        'white'                 => array('label' => 'White', 'default' => '#010101'),
        'text'                  => array('label' => 'Text', 'default' => '#344657'),
        'muted'                 => array('label' => 'Muted', 'default' => '#71808a'),
        'border'                => array('label' => 'Border', 'default' => '#e3e8df'),
    );
}

// Override :root with any colours changed in the Customizer
function scalatax_colour_scheme_css() {
    $declarations = '';
    foreach (scalatax_colour_scheme() as $variable => $colour) {
        $value = sanitize_hex_color(get_theme_mod("colour-$variable", $colour['default']));
        if ($value && strcasecmp($value, $colour['default']) !== 0) {
            $declarations .= "--$variable: $value;";
        }
    }
    if ($declarations) {
        wp_add_inline_style('ourmaincss', ":root{{$declarations}}");
    }
}

add_action('wp_enqueue_scripts', 'scalatax_colour_scheme_css', 20);

function scalatax_add_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'scalatax'),
        'explore' => __('Explore (Footer)', 'scalatax'),
        'services' => __('Services (Footer)', 'scalatax'),
        'footer' => __('Footer Menu', 'scalatax'),
    ));
}

add_action('after_setup_theme', 'scalatax_add_support');

add_action('customize_register', 'theme_copyright_customizer');

function theme_copyright_customizer($wp_customize)
{
    class Example_Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
    
        public function render_content() {
            ?>
            <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
            <?php
        }
    }

    /* Custom Separator */
    if (class_exists('WP_Customize_Control')) {
        class Separator_Custom_Control extends WP_Customize_Control{
            public $type = 'separator';
        
            // Render the control's content.
            public function render_content(){
                echo '<hr>';
            } 
        }
    }

    require_once get_template_directory() . '/includes/customizer/options.php';

    
}

function register_post_type__event(){
    register_post_type('service', array(
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'services',
        ),
        'public' => true,
        'labels' => array(
            'name' => 'Services',
            'add_new_item' => 'Add New Service',
            'add_new' => 'Add Service',
            'edit_item' => 'Edit Service',
            'all_items' => 'All Services',
            'singular_name' => 'Service',
            'not_found' => 'No Services Found'
        ),
        'menu_icon' => 'dashicons-calculator',
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}

add_action('init', 'register_post_type__event');

// Contact page selector under Settings → Reading, alongside the homepage and posts page
function scalatax_register_contact_page_setting() {
    register_setting('reading', 'scalatax_page_for_contact', array(
        'type' => 'integer',
        'sanitize_callback' => 'absint',
        'default' => 0,
    ));

    add_settings_field('scalatax_page_for_contact', __('Contact page', 'scalatax'), function () {
        wp_dropdown_pages(array(
            'name' => 'scalatax_page_for_contact',
            'show_option_none' => __('&mdash; Select &mdash;'),
            'option_none_value' => '0',
            'selected' => get_option('scalatax_page_for_contact'),
        ));
    }, 'reading', 'default', array('label_for' => 'scalatax_page_for_contact'));
}

add_action('admin_init', 'scalatax_register_contact_page_setting');

// Same option in Customizer → Homepage Settings, below the homepage and posts page
function scalatax_customize_contact_page($wp_customize) {
    $wp_customize->add_setting('scalatax_page_for_contact', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'absint',
        'default' => 0,
    ));

    $wp_customize->add_control('scalatax_page_for_contact', array(
        'label' => __('Contact page', 'scalatax'),
        'section' => 'static_front_page',
        'type' => 'dropdown-pages',
        'allow_addition' => true,
        'priority' => 20,
    ));
}

add_action('customize_register', 'scalatax_customize_contact_page');

// Label the page in the Pages list, like "Front Page" and "Posts Page"
function scalatax_contact_page_state($states, $post) {
    if ($post->ID === (int) get_option('scalatax_page_for_contact')) {
        $states['scalatax_page_for_contact'] = __('Contact Page', 'scalatax');
    }
    return $states;
}

add_filter('display_post_states', 'scalatax_contact_page_state', 10, 2);

// Whichever page is selected uses the contact template, regardless of its slug
function scalatax_contact_page_template($template) {
    $contact_id = (int) get_option('scalatax_page_for_contact');
    if ($contact_id && is_page($contact_id)) {
        $contact_template = locate_template('page-contact-us.php');
        if ($contact_template) {
            return $contact_template;
        }
    }
    return $template;
}

add_filter('page_template', 'scalatax_contact_page_template');

function scalatax_contact_url() {
    $contact_id = (int) get_option('scalatax_page_for_contact');
    return $contact_id ? get_permalink($contact_id) : home_url('/');
}