var switchButtons = document.querySelectorAll('.switcher__link');

var addSwitchButtonClickHandler = function(btn) {
    btn.addEventListener('click', function() {

        for (var i = 0; i < switchButtons.length; i++) {
            if (switchButtons[i].classList.contains('switcher__link--active')) {
                switchButtons[i].classList.remove('switcher__link--active');
            }
        }
        btn.classList.add('switcher__link--active');
    })
}

for (var i = 0; i < switchButtons.length; i++) {
    addSwitchButtonClickHandler(switchButtons[i]);
}

function ChangeSliders(actual_id) {
    var all_sliders = document.querySelectorAll('.slider--demonstration');

    for (var i = 0; i < all_sliders.length; i++) {
        all_sliders[i].classList.add('slider--hidden');
    }
    document.querySelector(actual_id).classList.remove('slider--hidden');
}


document.addEventListener('DOMContentLoaded', function() {

    // document.querySelector('.header').classList.add('tp');

    // var var_scroll = 0;

    // window.addEventListener('scroll', function() {
    //     var_scroll = (pageYOffset / document.documentElement.clientWidth) * 100;
    //     if (var_scroll > 40) {

    //         document.querySelector('.header').classList.remove('tp');
    //     } else {

    //         document.querySelector('.header').classList.add('tp');
    //     };
    // });


    var SlidersArr = document.querySelectorAll('.slider__inner--demonstration');

    for (var i = 0; i < SlidersArr.length; i++) {

        $(`#index_slider-left${i} .slider__inner--demonstration`).slick({
            slidesToShow: 1,
            infinite: false,
            prevArrow: $(`.btn--prev-${i}`),
            nextArrow: $(`.btn--next-${i}`),
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        appendArrows: false,
                        dots: true,
                    }
                }
            ],

        }).on('init', function (slider, currentSlide) {
            var slideCount = slider.slideCount;
            console.log(`slider #${i}: `+slideCount+` slides`);
            document.querySelector('.number_of_slides').innerHTML = slideCount;
        }).on(
            'afterChange',
            function (event, slick, currentSlide, slider) {
                var CurrID = $(event.target).attr('id');
                document.getElementById(CurrID).parentNode.querySelector('.current-count').textContent = currentSlide + 1;
            }
        );
    }


    $('.history').mouseenter(function() {

        $('.history-grid-top').addClass('history-blue');
        // $('.history-blue + .history-grid-date ').removeClass('hide-light');
        // $('.history-blue + .history-grid-date +  .history-grid-row ').removeClass('hide-light');
    });

    $('.history-grid').mouseenter(function() {


        $(' .history-grid-top + .history-grid-date ').addClass('history-blue');
        // $('.history-blue + .history-grid-date ').removeClass('hide-light');
        // $('.history-blue + .history-grid-date +  .history-grid-row ').removeClass('hide-light');
    });

    $('.history-grid-row').mouseenter(function() {


        $(' .history-blue + .history-grid-row + .history-grid-date ').addClass('history-blue');
        // $('.history-blue + .history-grid-date ').removeClass('hide-light');
        // $('.history-blue + .history-grid-date +  .history-grid-row ').removeClass('hide-light');
    });




})