$(function() {

    //Click enable
    $('.tab-navigate').on('click', function() {

        // Add active class
        $('.tab-navigate').removeClass('active');
        $(this).addClass('active');

        //Slide section to top
        var section_id = $(this).attr('data-target');

        var top = $(section_id).offset().top - 150;
        $('html, body').animate({
            scrollTop: top
        }, 100);

    });


    //click to change image 
    $('.gallery-thumbnails').on('click', function() {

        var img_url = $(this).children('img').attr('src');

        $('figure.main-img').children('a').children('img').attr('src', img_url)

    });


    // //qty change
    // $('.qty-reduce').on('click', function() {
    //     let inpt = $(this).next('input');
    //     let qty = inpt.val();
    //     if (qty > 1) {
    //         qty--;
    //     }
    //     inpt.val(qty);
    // })

    // $('.qty-increase').on('click', function() {
    //     let inpt = $(this).prev('input');
    //     let qty = inpt.val();
    //     if (qty < 100) {
    //         qty++;
    //     }
    //     inpt.val(qty);
    // })



})