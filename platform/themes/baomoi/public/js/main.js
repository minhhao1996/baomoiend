$(document).ready(function() {
    $(window).bind('scroll', function () {

        if ($(window).scrollTop() > $('.header-full' ).height()) {
            $('.h-content-bottom').addClass('menu-fixed');
        } else {
            $('.h-content-bottom').removeClass('menu-fixed');
        }
    });


});
