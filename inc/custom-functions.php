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
 * Custom shortcode example
 *
 * Usage: [custom_shortcode attribute="value"]
 */
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

/**
 * Add custom body classes
 */
function base_child_body_classes($classes) {
    // Add a class if it's the front page
    if (is_front_page()) {
        $classes[] = 'front-page-custom';
    }
    
    return $classes;
}
add_filter('body_class', 'base_child_body_classes');

/**
 * Custom excerpt length
 */
function base_child_custom_excerpt_length($length) {
    return 20; // Change this number to adjust excerpt length
}
// Uncomment the next line to modify excerpt length
// add_filter('excerpt_length', 'base_child_custom_excerpt_length', 999);

/**
 * Custom excerpt more
 */
function base_child_custom_excerpt_more($more) {
    return '... <a class="read-more" href="' . get_permalink(get_the_ID()) . '">' . __('Read More', 'base-child') . '</a>';
}
// Uncomment the next line to modify the excerpt more text
// add_filter('excerpt_more', 'base_child_custom_excerpt_more');

/**
 * Add custom login logo
 */
function base_child_custom_login_logo() {
    if (file_exists(get_stylesheet_directory() . '/assets/img/logo.png')) {
        ?>
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
                width: 320px;
                height: 80px;
                background-size: contain;
                background-repeat: no-repeat;
                padding-bottom: 30px;
            }
        </style>
        <?php
    }
}
// Uncomment the next line to use a custom login logo
// add_action('login_enqueue_scripts', 'base_child_custom_login_logo');

/**
 * Custom admin footer text
 */
function base_child_custom_admin_footer_text() {
    return 'Developed by <a href="https://imagewize.com" target="_blank">Imagewize</a>';
}
// Uncomment the next line to modify admin footer text
// add_filter('admin_footer_text', 'base_child_custom_admin_footer_text');

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
