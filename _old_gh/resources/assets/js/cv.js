/*
    Template Name: Classic - Minimal CV/Personal Portfolio
    Version: 1.0
    Author: BulkStudio
    Author URI: http://bulkstudio.com
    Description: CV, Resume, Portfolio Minimal HTML5 Template
*/

(function($) {

    "use strict";

    /* ---- Textillate ---- */
    $('.til').textillate({

        // enable looping
        loop: true,
        in : {
            effect: 'fadeIn',
            delayScale: 1.5,
            delay: 150,
            shuffle: true
        },
        out: {
            effect: 'fadeOut',
            delayScale: 1.5,
            delay: 150,
            shuffle: true
        }
    });

    /* ---- Magnific Bug Workaround ---- */
    $(document).on('click', '.mfp-close', function(e) {
        e.preventDefault();
        $.magnificPopup.close();
    });

    /* ---- Menu Toggle Class ---- */
    $('.menu-holder').on('click', function() {
        $('.menu').toggleClass('menu-active');
    });

    /* ---- Skill Scroll To Run ---- */
    var loop = 0;

    function animateSkill(delay) {
        $('.skillbar').each(function() {

            $(this).find('.to-animate').animate({

                width: $(this).attr('data-percent')

            }, delay);

            delay += 350;
        });

        loop = 1;
    }

})(jQuery);


/* ----------- Phone Number Link ----------- */

$('#phone-number').on('click', function() {
    alert($(this).data('warning'));
    $(this).find('span').text( $(this).data('last') );
});