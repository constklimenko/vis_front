$(document).ready(function() {
    if (window.matchMedia("(max-width: 1020px)").matches) {


        $('.footer-text + .footer-text + div').append('<a download="" class="footer-download" href=" <?=CFile::GetPath($arResult[\'PROPERTIES\'][\'PRESENTATION\'][\'VALUE\'])?>" >СКАЧАТЬ ПРЕЗЕНТАЦИЮ</a>');
    };
})



