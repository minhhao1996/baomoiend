$(document).ready(function () {
    $(window).bind('scroll', function () {

        if ($(window).scrollTop() > $('.header-full').height()) {
            $('.h-content-bottom').addClass('menu-fixed');
        } else {
            $('.h-content-bottom').removeClass('menu-fixed');
        }
    });

    let url = $("#navbarText .item-cat.active").attr('url-load');
    loadContentMain(url)
    $(".btn-hot").click(function (){
        $(".navbar-nav  ").find(".active").removeClass('active')
        $(this).addClass("active")
        let urlHot = $("#navbarText .item-cat.active").attr('url-load');
        loadContentMain(urlHot)
    })
    $(".btn-new").click(function (){
        $(".navbar-nav  ").find(".active").removeClass('active')
        $(this).addClass("active")
        let urlHot = $("#navbarText .item-cat.active").attr('url-load');
        loadContentMain(urlHot)
    })

});

function loadContentMain(url) {

    $.ajax({
        type: 'GET',
        url: url,
        success: function (data) {
            $(".list-main-post").html(data.data)
        }
    });

}
