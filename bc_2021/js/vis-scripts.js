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


        $('.input_phone').mask('+7(000)000-00-00');
    $('input[name^="form_email"]').mask("A", {
        translation: {
            "A": { pattern: /[\w@\-.+]/, recursive: true }
        }
    });

    $('.index_form  input').attr("placeholder", " ");




    if (window.matchMedia("(max-width: 992px)").matches) {
        $('.offices__row').slick({
            variableWidth: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            arrows: false,
            dots: true
        });
    } else {
        $(".fbs")
            .attr('rel', 'gallery')
            .fancybox({
                padding: 0,
                margin: 5,
                infobar: true,
                nextEffect: 'none',
                prevEffect: 'none',
                autoCenter: false,
                helpers: {
                    title: { type: 'float' },
                    buttons: ["slideshow"]
                },
                afterLoad: function() {
                    $.extend(this, {
                        aspectRatio: false,
                        type: 'html',
                        width: '100%',
                        height: '100%',
                        content: '<div class="fancybox-image" style="background-image:url(' + this.href + '); background-size: cover; background-position:50% 50%;background-repeat:no-repeat;height:100%;width:100%;" /> </div>'
                    });
                }
            });
    };
});