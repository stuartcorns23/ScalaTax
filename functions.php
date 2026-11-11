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
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
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

function disable_comments() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'disable_comments');

// Remove Comments link from the admin sidebar menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php'); //
});

// Remove Comments link from the top Admin Bar
add_action('wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
});

// Remove Recent Comments widget from the Admin Dashboard dashboard
add_action('wp_dashboard_setup', function () {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //
});

function get_breadcrumb()
{
    $breadcrumbs = '';

    $breadcrumbs = '<div class="breadcrumbs"><ul>';
    $breadcrumbs .= '<li><a class="" href="' . home_url() . '" rel="nofollow">Home</a></li>';

    if(is_category() || is_single()){
        $categories = get_the_category();
        if(!empty($categories)){
            $breadcrumbs .= '<li><a class="" href="' . get_category_link($categories[0]->term_id) . '" rel="nofollow">' . esc_html( $categories[0]->name ) . '</a></li>';
        }
        if(is_single()){
            $breadcrumbs .= '<li>' . get_the_title() . '</li>';
        }
    } else if(is_page()){
        $breadcrumbs .= '<li>' . get_the_title() . '</li>';
    } else if(is_search()){
        $breadcrumbs .= '<li>"<em>' . get_search_query() . '</em>"</li>';
    }

    $breadcrumbs .= '</ul></div>';

    echo $breadcrumbs;

	// echo '<a class="text-white" href="' . home_url() . '" rel="nofollow">Home</a>';
	
    // if(is_category() || is_single())
	// {
	// 	echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
	// 	the_category(' &bull; ');
	// 	if(is_single())
	// 	{
	// 		echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
	// 		the_title();
	// 	}
	// } else if(is_page())
	// {
	// 	echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
	// 	echo the_title();
	// } else if(is_search())
	// {
	// 	echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
	// 	echo '"<em>';
	// 	echo the_search_query();
	// 	echo '</em>"';
	// }

}

function breadcrumbs() {
    $breadcrumbs = array();

    // Home
    $breadcrumbs[] = (object) array(
        'name' => 'Home',
        'url'  => home_url()
    );

    // Pages
    if (is_page()) {
        global $post;

        $parents = array_reverse(get_post_ancestors($post->ID));

        // Add parent pages
        foreach ($parents as $parent_id) {
            $breadcrumbs[] = (object) array(
                'name' => get_the_title($parent_id),
                'url'  => get_permalink($parent_id)
            );
        }

        // Current page
        $breadcrumbs[] = (object) array(
            'name' => get_the_title(),
            'url'  => null
        );
    }

    // Single blog post (custom post types fall through to the is_singular() branch below)
    elseif (is_singular('post')) {
        $category = get_the_category();
        if (!empty($category)) {
            $cat = $category[0];

            $breadcrumbs[] = (object) array(
                'name' => $cat->name,
                'url'  => get_category_link($cat->term_id)
            );
        }

        $breadcrumbs[] = (object) array(
            'name' => get_the_title(),
            'url'  => null
        );
    }

    // Category archive
    elseif (is_category()) {
        $breadcrumbs[] = (object) array(
            'name' => single_cat_title('', false),
            'url'  => null
        );
    }

    // Custom post type
    elseif (is_singular()) {
        global $post;
        $post_type = get_post_type_object(get_post_type());

        if ($post_type && $post_type->has_archive) {
            $breadcrumbs[] = (object) array(
                'name' => $post_type->labels->name,
                'url'  => get_post_type_archive_link($post_type->name)
            );
        }

        $breadcrumbs[] = (object) array(
            'name' => get_the_title(),
            'url'  => null
        );
    }

    return $breadcrumbs;
}

// Articles per page on the blog listings, set under Customizer → Blog → Blog Listing
add_action('pre_get_posts', function ($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if ($query->is_home() || $query->is_category() || $query->is_tag() || $query->is_author() || $query->is_date() || $query->is_search()) {
        $per_page = absint(get_theme_mod('blog-posts-per-page', get_option('posts_per_page')));
        if ($per_page > 0) {
            $query->set('posts_per_page', $per_page);
        }
    }
});

// Featured image URL, falling back to the theme's default image when none is set
function scalatax_featured_image_url($post = null, $size = 'full') {
    $url = get_the_post_thumbnail_url($post, $size);

    return $url ? $url : get_theme_file_uri('/images/scala-tax-home-1.avif');
}
