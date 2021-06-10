function toggleNav() {
    document.querySelector('.header__bottom').classList.toggle('m-hide');
};

function toggleElemTab() {
    var ht = document.querySelectorAll('.elem_tabs-header-tab');
    for (var x = 0; x < ht.length; x++) {

        ht[x].classList.toggle('elem_tabs-header-tab--active');
    };

    var et = document.querySelectorAll('.elem_tabs-content');

    for (var x = 0; x < et.length; x++) {

        et[x].classList.toggle('m-show');
    };
};



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
            var countOfSlides = $('.number_of_slides').text();

            $('.current-count').text(currentSlide + 1);
        }
    );
    if (window.matchMedia("(max-width: 700px)").matches) {
        $('.similar-row').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            arrows: false,
            dots: true,
            fade: true


        });
    } else {


        $(".fbs").fancybox();
    };



});