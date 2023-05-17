jQuery(document).ready(function($) {
//  Slick sliders
// ----------------------------------------------------------------------------

class SlickCarousel {
    constructor() {
        this.initiateCarousel();
    }
    initiateCarousel() {
        $('.slider-single').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            useCSS: true,
            useTransform: true,
            speed: 400,
            prevArrow: $('.btn-prev'),
            nextArrow: $('.btn-next'),
            asNavFor: '.slider-nav'
        });
        $('.slider-nav')
        .on('init', function(event, slick) {
            $('.slider-nav .slick-slide.slick-current').addClass('is-active');
        }).slick({
            vertical: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            verticalSwiping: true,
            dots: false,
            arrows: false,
            accessibility: true,
 		    focusOnSelect: false,
 		    infinite: false,
            responsive: [
                {
                breakpoint: 991,
                settings: {
                    swipe: true,
                    vertical: false,
                    verticalSwiping: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    nextArrow: $('.btn-next'),
                }
                }
            ]
    });
    $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
        $('.slider-nav').slick('slickGoTo', currentSlide);
        var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
        $('.slider-nav .slick-slide.is-active').removeClass('is-active');
        $(currrentNavSlideElem).addClass('is-active');
    });
    $('.slider-nav').on('click', '.slick-slide', function(event) {
        event.preventDefault();
        var goToSingleSlide = $(this).data('slick-index');
        $('.slider-single').slick('slickGoTo', goToSingleSlide);
    });
    }
}

new SlickCarousel();

})(jQuery);
