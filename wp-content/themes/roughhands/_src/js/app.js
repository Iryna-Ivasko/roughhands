// require jquery.min.js

//require what-input.min.js

// Core Foundation files
//=require foundation.core.min.js
//=require foundation.util.*.min.js

//=require foundation.dropdown.min.js
// require foundation.responsiveMenu.min.js
//=require foundation.responsiveToggle.min.js
//=require foundation.toggler.min.js
//=require foundation.offcanvas.min.js
//
// to inlude foundation plugins add "=" sign below
//
// require foundation.abide.min.js
// require foundation.accordion.min.js
// require foundation.accordionMenu.min.js
// require foundation.drilldown.min.js
//=require foundation.dropdownMenu.min.js
//=require foundation.equalizer.min.js
// require foundation.interchange.min.js
// require foundation.magellan.min.js

// require foundation.reveal.min.js
// require foundation.slider.min.js
// require foundation.sticky.min.js
// require foundation.tabs.min.js
// require foundation.tooltip.min.js
// require foundation.zf.responsiveAccordionTabs.min.js

//=require slick.min.js
//
// Google Map ACF functions
// require components/map.js

;
(function($) {
	// init Foundation
	$(document).foundation();
	// flex Video
	// $( 'iframe[src*="youtube.com"]').wrap("<div class='flex-video widescreen'/>");
	// $( 'iframe[src*="vimeo.com"]').wrap("<div class='flex-video widescreen vimeo'/>");

	$(document).ready(function() {
		var $slider = $('.proud-slider');


        $slider.slick({
            centerPadding: '19vw',
            arrows: true,
            centerMode: true,
            slidesToShow: 3,
            dots: true,
            responsive: [
                {
                    breakpoint: 1900,
                    settings: {
                        centerMode: true,
                        arrows: true,
                        centerPadding: '19vw',
                        slidesToShow: 2,
                        dots: true
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        centerPadding: '19vw',
                        arrows: true,
                        centerMode: true,
                        slidesToShow: 1,
                        dots: true
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        centerPadding: '25vw',
                        arrows: true,
                        centerMode: true,
                        slidesToShow: 1,
                        dots: true
                    }
                }
            ]
        });

	});

	$(window).load(function() {

	});

	$(window).on('resize', function() {

	});

})(jQuery);


















