//example of how to implement jquery with no conflict wrapper
(function ($) {
    $('body').addClass('test');
})(jQuery);