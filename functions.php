<?php
/**
 * Base Child Theme Functions
 *
 * @package Base_Child_Theme
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Define Constants
 */
define('CHILD_THEME_VERSION', '1.0.0');
define('CHILD_THEME_DIR', get_stylesheet_directory());
define('CHILD_THEME_URI', get_stylesheet_directory_uri());

/**
 * Enqueue parent and child theme styles and scripts
 */
function base_child_theme_enqueue_styles() {
    // Get the parent theme name from the Template header in style.css
    $parent_theme = wp_get_theme()->parent();
    
    if ($parent_theme) {
        $parent_theme_name = $parent_theme->get('TextDomain');
        if (empty($parent_theme_name)) {
            $parent_theme_name = $parent_theme->get_template();
        }
        
        // Enqueue parent style
        wp_enqueue_style(
            $parent_theme_name . '-style',
            get_template_directory_uri() . '/style.css',
            array(),
            $parent_theme->get('Version')
        );
    }
    
    // Enqueue child theme style
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/assets/css/child-theme.css',
        array($parent_theme_name . '-style'),
        CHILD_THEME_VERSION
    );
    
    // Enqueue child theme script
    wp_enqueue_script(
        'child-script',
        get_stylesheet_directory_uri() . '/assets/js/child-theme.js',
        array('jquery'),
        CHILD_THEME_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'base_child_theme_enqueue_styles', 20);

/**
 * Create necessary directories if they don't exist
 * This runs once on theme activation
 */
function base_child_theme_activation() {
    $directories = array(
        '/assets',
        '/assets/css',
        '/assets/js',
        '/assets/img',
        '/inc',
        '/template-parts'
    );
    
    foreach ($directories as $dir) {
        $directory_path = get_stylesheet_directory() . $dir;
        if (!file_exists($directory_path)) {
            wp_mkdir_p($directory_path);
        }
    }
    
    // Create default CSS file if it doesn't exist
    $css_file = get_stylesheet_directory() . '/assets/css/child-theme.css';
    if (!file_exists($css_file)) {
        file_put_contents($css_file, "/**\n * Child Theme Custom Styles\n */\n\n/* Your custom styles go here */");
    }
    
    // Create default JS file if it doesn't exist
    $js_file = get_stylesheet_directory() . '/assets/js/child-theme.js';
    if (!file_exists($js_file)) {
        file_put_contents($js_file, "/**\n * Child Theme Custom Scripts\n */\n\njQuery(document).ready(function($) {\n    // Your custom scripts go here\n});");
    }
}
add_action('after_switch_theme', 'base_child_theme_activation');

/**
 * Include additional functionality files
 */
$includes = array(
    '/inc/custom-functions.php',   // Custom functions
    '/inc/customizer.php',         // Customizer options
);

foreach ($includes as $file) {
    $filepath = get_stylesheet_directory() . $file;
    if (file_exists($filepath)) {
        require_once $filepath;
    }
}

/**
 * Override parent theme functions
 * 
 * To override a function from the parent theme:
 * 1. Copy the function from the parent theme
 * 2. Paste it here with the same function name
 * 3. Make your modifications to the function
 * 
 * Note: Make sure the parent function isn't pluggable (wrapped in function_exists)
 * before attempting to override it.
 */

/**
 * Example of overriding a parent theme function:
 * If the parent theme has a function called 'parent_theme_setup', you can override it like this:
 * 
 * function parent_theme_setup() {
 *     // Your custom implementation here
 * }
 */

/**
 * Add custom image sizes
 */
// add_image_size('custom-size', 800, 600, true);

/**
 * Register widget areas/sidebars
 */
function base_child_theme_widgets_init() {
    register_sidebar(array(
        'name'          => __('Child Theme Sidebar', 'base-child'),
        'id'            => 'child-sidebar-1',
        'description'   => __('Add widgets here.', 'base-child'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
// Uncomment the next line to register the sidebar
// add_action('widgets_init', 'base_child_theme_widgets_init');

/**
 * Editor Styles
 */
function base_child_theme_editor_styles() {
    // Add editor styles if they exist
    if (file_exists(get_stylesheet_directory() . '/assets/css/editor-style.css')) {
        add_editor_style('assets/css/editor-style.css');
    }
}
add_action('after_setup_theme', 'base_child_theme_editor_styles');

/**
 * Custom template tags for this theme
 */
// function base_child_posted_on() {
//     // Custom implementation
// }

/**
 * Add support for custom logo, if parent theme doesn't already
 */
function base_child_theme_setup() {
    // Add theme support for Custom Logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Add other theme supports as needed
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    
    // Register Navigation Menus
    register_nav_menus(array(
        'child-menu' => __('Child Theme Menu', 'base-child'),
    ));
}
add_action('after_setup_theme', 'base_child_theme_setup', 11); // Priority 11 ensures it runs after the parent theme's setup
