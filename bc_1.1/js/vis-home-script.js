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


   var SlidersArr = document.querySelector('.index_slider').querySelectorAll('.img-slider');

   for(var i=0; i<SlidersArr.length; i++){

       $(`#index_slider-left${i} .img-slider`).slick({
           slidesToShow: 1,
           appendArrows: `#index_slider-left${i} .slider-nav`,

       }).on('init', (slider, currentSlide) => {

           var slideCount = slider.slideCount;
           document.querySelector('.number_of_slides').innerHTML = slideCount;
       }).on(
           'afterChange',
           (event, slick, currentSlide, slider) => {
               var CurrID =  $(event.target).attr('id');
               document.getElementById( CurrID ).parentNode.querySelector('.current-count').textContent = currentSlide + 1;
           }
       );
   }



})