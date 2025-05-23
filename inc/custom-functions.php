<?php
/**
 * Custom Functions for Base Child Theme
 *
 * @package Base_Child_Theme
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Example: Custom shortcode
 * Uncomment and modify as needed
 */
/*
function base_child_custom_shortcode($atts) {
    // Parse attributes
    $atts = shortcode_atts(array(
        'attribute' => 'default',
    ), $atts, 'custom_shortcode');
    
    // Process shortcode
    $output = '<div class="custom-shortcode-wrapper">';
    $output .= 'Shortcode output with attribute: ' . esc_html($atts['attribute']);
    $output .= '</div>';
    
    return $output;
}
add_shortcode('custom_shortcode', 'base_child_custom_shortcode');
*/

/**
 * Example: Add custom body classes
 * Uncomment and modify as needed
 */
/*
function base_child_body_classes($classes) {
    // Add a class if it's the front page
    if (is_front_page()) {
        $classes[] = 'front-page-custom';
    }
    
    return $classes;
}
add_filter('body_class', 'base_child_body_classes');
*/

/**
 * Add custom image sizes to media library dropdown
 */
function base_child_custom_image_sizes($sizes) {
    return array_merge($sizes, array(
        'custom-size' => __('Custom Size', 'base-child'),
    ));
}
// Uncomment the next line if you've added custom image sizes
// add_filter('image_size_names_choose', 'base_child_custom_image_sizes');

/**
 * Add a wrapper around iframes (like YouTube embeds)
 */
function base_child_wrap_iframe($html) {
    return '<div class="responsive-iframe-container">' . $html . '</div>';
}
// Uncomment the next line to add responsive wrapper for iframes
// add_filter('embed_oembed_html', 'base_child_wrap_iframe', 10, 3);

/**
 * Add custom favicon
 */
function base_child_custom_favicon() {
    if (file_exists(get_stylesheet_directory() . '/assets/img/favicon.ico')) {
        echo '<link rel="shortcut icon" href="' . get_stylesheet_directory_uri() . '/assets/img/favicon.ico" />';
    }
}
// Uncomment the next line to add a custom favicon
// add_action('wp_head', 'base_child_custom_favicon');
