function ChangeSliders(actual_id) {


    var all_sliders = document.querySelectorAll('.index_slider-left');

    for (i = 0; i < all_sliders.length; i++) {
        all_sliders[i].classList.add('hide-light');

    }
    document.querySelector(actual_id).classList.remove('hide-light');


}


$(document).ready(function() {





    document.querySelector('.header').classList.add('tp');
    var var_scroll = 0;

    window.addEventListener('scroll', function() {
        var_scroll = (pageYOffset / document.documentElement.clientWidth) * 100;
        if (var_scroll > 40) {

            document.querySelector('.header').classList.remove('tp');
        } else {

            document.querySelector('.header').classList.add('tp');
        };
    });





    $('#index_slider-left1 .img-slider').slick({
        slidesToShow: 1,

        appendArrows: '#index_slider-left1 .slider-nav',

    }).on('init', (slider) => {
        var slideCount = slider.slideCount;
        document.querySelector('#index_slider-left1 .number_of_slides').innerHTML = slideCount;
    }).on(
        'afterChange',
        (event, slick, currentSlide, slideCount) => {
            var countOfSlides = $('#index_slider-left1 .number_of_slides').text();

            $('#index_slider-left1 .current-count').text(currentSlide + 1);
        }
    );

    $('#index_slider-left2 .img-slider').slick({
        slidesToShow: 1,

        appendArrows: '#index_slider-left2 .slider-nav',

    }).on('init', (slider) => {
        var slideCount = slider.slideCount;
        document.querySelector('#index_slider-left2 .number_of_slides').innerHTML = slideCount;
    }).on(
        'afterChange',
        (event, slick, currentSlide, slideCount) => {
            var countOfSlides = $('#index_slider-left2 .number_of_slides').text();

            $('#index_slider-left2 .current-count').text(currentSlide + 1);
        }
    );


    $('#index_slider-left3 .img-slider').slick({
        slidesToShow: 1,

        appendArrows: '#index_slider-left3 .slider-nav',

    }).on('init', (slider) => {
        var slideCount = slider.slideCount;
        document.querySelector('#index_slider-left3 .number_of_slides').innerHTML = slideCount;
    }).on(
        'afterChange',
        (event, slick, currentSlide, slideCount) => {
            var countOfSlides = $('#index_slider-left3 .number_of_slides').text();

            $('#index_slider-left3 .current-count').text(currentSlide + 1);
        }
    );
})