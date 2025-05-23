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

/**
 * Enqueue parent and child theme styles
 */
function base_child_theme_enqueue_styles() {
    // Get the parent theme
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
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_theme_name . '-style'),
        CHILD_THEME_VERSION
    );
    
    /**
     * Example: Uncomment to enqueue additional child theme CSS file
     */
    /*
    wp_enqueue_style(
        'child-extra-style',
        get_stylesheet_directory_uri() . '/assets/css/child-theme.css',
        array($parent_theme_name . '-style'),
        CHILD_THEME_VERSION
    );
    */
    
    /**
     * Example: Uncomment to enqueue child theme JavaScript file
     */
    /*
    wp_enqueue_script(
        'child-script',
        get_stylesheet_directory_uri() . '/assets/js/child-theme.js',
        array('jquery'),
        CHILD_THEME_VERSION,
        true
    );
    */
}
add_action('wp_enqueue_scripts', 'base_child_theme_enqueue_styles', 20);

/**
 * Example: Including additional functionality files
 * Uncomment and modify as needed
 */
/*
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
*/

/**
 * Example: Override parent theme functions
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
 * Example: Add theme setup function
 * Uncomment and modify as needed
 */
/*
function base_child_theme_setup() {
    // Example: Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'base_child_theme_setup', 11); // Priority 11 ensures it runs after the parent theme
*/
