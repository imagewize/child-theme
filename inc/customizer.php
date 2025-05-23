<?php
/**
 * Customizer Settings for Base Child Theme
 *
 * @package Base_Child_Theme
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Example: Add theme customizer options
 * Uncomment and modify as needed
 */
/*
function base_child_customize_register($wp_customize) {
    
    // Example: Add a section
    $wp_customize->add_section('base_child_options', array(
        'title'    => __('Child Theme Options', 'base-child'),
        'priority' => 120,
    ));
    
    // Example: Add a color setting
    $wp_customize->add_setting('header_background_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(
        'label'    => __('Header Background Color', 'base-child'),
        'section'  => 'base_child_options',
        'settings' => 'header_background_color',
    )));
}
*/
add_action('customize_register', 'base_child_customize_register');

/**
 * Sanitize layout setting
 */
function base_child_sanitize_layout($input) {
    $valid = array(
        'right-sidebar',
        'left-sidebar',
        'no-sidebar',
    );
    
    if (in_array($input, $valid, true)) {
        return $input;
    }
    
    return 'right-sidebar';
}

/**
 * Customizer Preview JS
 */
function base_child_customize_preview_js() {
    wp_enqueue_script(
        'base-child-customizer',
        get_stylesheet_directory_uri() . '/assets/js/customizer.js',
        array('customize-preview'),
        CHILD_THEME_VERSION,
        true
    );
}
add_action('customize_preview_init', 'base_child_customize_preview_js');

/**
 * Generate Custom CSS based on customizer settings
 */
function base_child_customizer_css() {
    ?>
    <style type="text/css">
        /* Header Background Color */
        .site-header {
            background-color: <?php echo esc_attr(get_theme_mod('header_background_color', '#ffffff')); ?>;
        }
        
        /* Layout Options */
        <?php if (get_theme_mod('content_layout', 'right-sidebar') === 'left-sidebar') : ?>
        .content-area {
            float: right;
        }
        .widget-area {
            float: left;
        }
        <?php elseif (get_theme_mod('content_layout', 'right-sidebar') === 'no-sidebar') : ?>
        .content-area {
            float: none;
            width: 100%;
            margin: 0 auto;
        }
        .widget-area {
            display: none;
        }
        <?php endif; ?>
        
        /* Typography Options */
        <?php if (get_theme_mod('body_font_family', 'default') !== 'default') : ?>
        body {
            font-family: <?php echo esc_attr(get_theme_mod('body_font_family', 'default')); ?>, sans-serif;
        }
        <?php endif; ?>
    </style>
    <?php
}
add_action('wp_head', 'base_child_customizer_css');
