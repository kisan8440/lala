$(function() {

    //js for owl-carousel
    $('.owl-carousel.banner-slider').owlCarousel({
        items: 1,
        margin: 0,
        stagePadding: 0,
        smartSpeed: 750,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        loop: true,
        nav: true,
    })

    //-- Our collaborations    
    $('.owl-carousel.best-deals').owlCarousel({
            items: 4,
            margin: 20,
            stagePadding: 0,
            smartSpeed: 500,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            loop: true,
            dots: false,
            nav: true,
            // center: true,
            autoWidth: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                782: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
        // -- HomePage Only

})