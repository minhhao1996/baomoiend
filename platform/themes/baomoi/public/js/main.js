$(document).ready(function() {
    $(window).bind('scroll', function () {

        if ($(window).scrollTop() > $('.header-full' ).height()) {
            $('.h-content-bottom').addClass('menu-fixed');
        } else {
            $('.h-content-bottom').removeClass('menu-fixed');
        }
    });

    $("#news-slider").owlCarousel({
        items : 2,

        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:true,
        loop:false,
        margin:5,
        responsiveClass:true,
        stagePadding : 80
    });
});
$(document).ready(function() {
    $("#news-animal").owlCarousel({
        items : 2,

        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:true,
        loop:false,
        margin:5,
        responsiveClass:true,
        stagePadding : 80
    });
});
$(document).ready(function() {
    $("#news-cosmetics").owlCarousel({
        items : 2,

        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:true,
        loop:false,
        margin:5,
        responsiveClass:true,
        stagePadding : 80
    });
});
