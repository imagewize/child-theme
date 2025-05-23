/**
 * Child Theme Custom Scripts
 */

jQuery(document).ready(function($) {
    /**
     * Mobile Navigation Toggle
     */
    $('.menu-toggle').on('click', function() {
        $(this).toggleClass('toggled');
        $('.main-navigation').toggleClass('toggled');
    });
    
    /**
     * Smooth scroll for anchor links
     */
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && 
            location.hostname == this.hostname) {
            
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 500);
                return false;
            }
        }
    });
    
    /**
     * Add responsive class to tables
     */
    $('.entry-content table').wrap('<div class="table-responsive"></div>');
    
    /**
     * Add responsive class to WordPress embeds
     */
    $('.wp-embed, iframe[src*="youtube"], iframe[src*="vimeo"]').parent().addClass('responsive-embed');
    
    /**
     * Back to top button functionality
     */
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });
    
    $('.back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
    
    /**
     * Initialize custom functionality
     */
    function initCustomFunctionality() {
        // Custom functionality can be added here
        console.log('Child theme scripts initialized');
    }
    
    // Initialize functionality
    initCustomFunctionality();
});

/**
 * Handle window resize events
 */
jQuery(window).resize(function() {
    // Add window resize handlers here
});

/**
 * Handle window load events
 */
jQuery(window).on('load', function() {
    // Add window load handlers here
});
