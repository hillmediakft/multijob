var homePage = function () {

    var InitImageSlider = function() {
        $('.iosSlider').iosSlider({
            desktopClickDrag: true,
            snapToChildren: true,
            infiniteSlider: true,
            navSlideSelector: '.slider .navigation li',
            onSlideComplete: function (args) {
                if (!args.slideChanged)
                    return false;

                $(args.sliderObject).find('.slider-info').attr('style', '');

                $(args.currentSlideObject).find('.slider-info').animate({
                    left: '15px',
                    opacity: '.9'
                }, 'easeOutQuint');
            },
            onSliderLoaded: function (args) {
                $(args.sliderObject).find('.slider-info').attr('style', '');

                $(args.currentSlideObject).find('.slider-info').animate({
                    left: '15px',
                    opacity: '.9'
                }, 'easeOutQuint');
            },
            onSlideChange: function (args) {
                $('.slider .navigation li').removeClass('active');
                $('.slider .navigation li:eq(' + (args.currentSlideNumber - 1) + ')').addClass('active');
            },
            autoSlide: true,
            scrollbar: true,
            scrollbarContainer: '.sliderContainer .scrollbarContainer',
            scrollbarMargin: '0',
            scrollbarBorderRadius: '0',
            keyboardControls: false
        });
    }


    return {
        //main function to initiate the module
        init: function () {
            InitImageSlider();

        }
    };


}();


jQuery(document).ready(function () {

    common_functions.init();
    modalHandler.init();
    sidebarSearch.init();
    homePage.init();

});