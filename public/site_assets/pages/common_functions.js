var common_functions = function () {

    var hideAlert = function () {
        $('div.alert').delay(3000).fadeOut(500);
    }

    var InitTabs = function () {
        $('.tabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    }

    var InitAccordion = function () {
        $('.accordion').on('show', function (e) {
            $(e.target).prev('.accordion-heading').find('.accordion-toggle').addClass('active');
        });

        $('.accordion').on('hide', function (e) {
            $(this).find('.accordion-toggle').not($(e.target)).removeClass('active');
        });
    }

    var InitChosen = function () {
        $('.chosen-select').chosen({
            disable_search_threshold: 10
        });
    }

    var InitEzmark = function () {
        $('input[type="checkbox"]').ezMark();
    }

    var InitOffCanvasNavigation = function () {
        $('#btn-nav').on({
            click: function () {
                $('body').toggleClass('nav-open');
            }
        })
    }

    return {
        //main function to initiate the module
        init: function () {

            hideAlert();
            InitTabs();
            InitAccordion();
            InitChosen();
            InitEzmark();
            InitOffCanvasNavigation();
        }
    };


}();