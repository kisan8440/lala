$(function() {

    // Toggle menu on button click
    $('.menu-toggler').on('click', function() {
        // Toggle menu bar button
        $(this).toggleClass('active');
        // Toggle main-nav-outer
        $('.main-nav-outer').toggleClass('active');
    });
    // Toggle menu on button click

    // toggle drop down
    $('ul.main-menu > li > a').on('click', function() {
        var c_menu = $(this);
        //Prevent click if dd menu
        if (c_menu.hasClass('down-menu')) {
            if (c_menu.hasClass('active')) {
                c_menu.removeClass('active');
            } else {
                c_menu.parent('li').siblings('li').children('a').removeClass('active');
                c_menu.addClass('active');
            }
            return false;
        };
    });

    $('body').on('click', function() {
        $('ul.main-menu > li > a').removeClass('active');
    });

    $('ul.main-menu > li > a ~ .dd-menu').on('click', function(e) {
            e.stopPropagation();
        })
        // toggle drop down

    // Back to top
    $("#backToTop").on("click", function() {
        var body = $("html, body");
        body.stop().animate({ scrollTop: 0 }, 400);
    });
    //-- Back to top

})

// move to top script

$(window).on('scroll', function(event) {
    var st = $(this).scrollTop();
    if (st > 500) {
        $("#backToTop").css({ "display": "inline-block" });
    } else {
        $("#backToTop").css({ "display": "none" });
    }
});

$(window).on('load', function() {
    $('#loader').fadeOut('fast');
});

// move to top script