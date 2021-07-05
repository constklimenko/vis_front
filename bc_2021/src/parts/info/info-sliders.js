$(function(){
    $('.vertical-slider').slick({
        vertical: true,
        verticalSwiping: true,
        slidesToShow: 3,
        arrows: false,
        asNavFor: '.horisontal-slider'
    }).on('init', (slider)=>{

        document.querySelector('.number_of_slides-2').innerHTML = slider.slideCount ;
    });


    $('.horisontal-slider').slick({

        slidesToShow: 1,
        asNavFor: '.vertical-slider',
        appendArrows: '.slider-nav',


    }).on('init', (slider)=>{
        var slideCount = slider.slideCount;
        document.querySelector('.number_of_slides').innerHTML = slideCount;

    })
        .on(
        'afterChange',
            (event, slick, currentSlide, slideCount)=>{
            var countOfSlides = $('.number_of_slides').text();

          $('.current-count').text(currentSlide + 1);
        }
    );

    if (window.matchMedia("(max-width: 700px)").matches) {
        $('.similar-row').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            arrows: false,
            dots: true,
            fade: true


        });};

});

