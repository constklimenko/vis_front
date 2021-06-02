$(function(){

    var number_of_slides = document.querySelectorAll('.horisontal-slider div').length;
    document.querySelector('.number_of_slides').innerHTML = number_of_slides;
    document.querySelector('.number_of_slides-2').innerHTML = number_of_slides - 1;



    $('.vertical-slider').slick({
        vertical: true,
        verticalSwiping: true,
        slidesToShow: 3,
        arrows: false,
        asNavFor: '.horisontal-slider'
    });


    $('.horisontal-slider').slick({

        slidesToShow: 1,
        asNavFor: '.vertical-slider',
        appendArrows: '.slider-nav',
        // dots: true,
        // dotsClass: 'custom_paging',
        // customPaging: function (slider, i) {
        //
        //     console.log(slider);
        //     return  (i + 1) + '/' + slider.slideCount;
        // }

    })
        .on(
        'afterChange',
        ()=>{
            var currentSlide = $('.horisontal-slider').slick('slickCurrentSlide');
            document.querySelector('.current-count').innerHTML = currentSlide + 1;
        }
    );
});