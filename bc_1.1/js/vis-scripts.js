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