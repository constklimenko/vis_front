$(document).ready(function () {
    //show only visible items in gallery mode
    $('.fancyCustom:visible').fancybox({
        // Options will go here
    });
    //Фильтрация
    $(document).on('click', 'li[data-id=artfil]', function (e) {
        e.preventDefault();
        var valforfilter = jQuery(this).attr('oval');
        $('li[data-id=artfil]').removeClass('active');
        $(this).css({'opacity': '0.5'}).animate({opacity: '1'}, 100).addClass('active')
        if(valforfilter === 'v') {
            $('#articleholder')
                .find('[data-xml-id]').show(10).css({'opacity': '0.5'}).animate({opacity: '1'}, 100)
        } else {
            $('#articleholder')
                .find('[data-xml-id]:not([data-xml-id="' + valforfilter + '"])').animate({opacity: '0.5'}, 50).hide(20)
                .end()
                .find('[data-xml-id="' + valforfilter + '"]').animate({opacity: '1'}, 50).show(20)
        }
        /*jQuery.ajax({
            type: 'POST',
            url: '/ajax/articlefilter.php?sessid=' + BX.bitrix_sessid(),
            beforeSend: function () {
                jQuery('div[id=articlesn]').animate({opacity: '0.5'}, 300);
            },
            data: ({valforfilter: valforfilter}),
            success: function (data) {
                jQuery('div[id=articlesn]').load('index.php div[id=articlesn]', function () {
                    jQuery('div[id=articlesn]').animate({opacity: '1'}, 300);
                });
            }
        });*/
    });
});