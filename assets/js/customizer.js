/**
 * WordPress Customizer preview script
 */

(function($) {
    // Live preview for the header background color
    wp.customize('header_background_color', function(value) {
        value.bind(function(newVal) {
            $('.site-header').css('background-color', newVal);
        });
    });
    
    // Live preview for the footer text
    wp.customize('footer_text', function(value) {
        value.bind(function(newVal) {
            $('.site-info').html(newVal);
        });
    });
})(jQuery);
