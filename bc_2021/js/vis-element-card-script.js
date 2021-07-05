$(document).ready(function() {
    $('.vertical-slider').slick({
        vertical: true,
        verticalSwiping: true,
        slidesToShow: 3,
        arrows: false,
        asNavFor: '.horisontal-slider'
    }).on('init', (slider) => {

        document.querySelector('.number_of_slides-2').innerHTML = slider.slideCount;
    });


    $('.horisontal-slider').slick({

        slidesToShow: 1,
        asNavFor: '.vertical-slider',
        appendArrows: '.slider-nav',
        dots: true,
        dotsClass: 'info-dots-container',


    }).on('init', (slider) => {
        var slideCount = slider.slideCount;
        document.querySelector('.number_of_slides').innerHTML = slideCount;
    }).on(
        'afterChange',
        (event, slick, currentSlide, slideCount) => {


            $('.current-count').text(currentSlide + 1);
        }
    );

})