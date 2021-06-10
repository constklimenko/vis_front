<?php
global $isAdmin;
global $isDevMode;
global $isDevSite;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>



<footer class="footer">
    <div class="footer-logo"></div>

        <?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
            "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
            "COMPONENT_TEMPLATE" => ".default",
            "DELAY" => "N",	// Откладывать выполнение шаблона меню
            "MAX_LEVEL" => "1",	// Уровень вложенности меню
            "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
            "MENU_CACHE_TYPE" => "A",	// Тип кеширования
            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
            "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
        ),
            false
        );?>
        <div class="footer-contacts">
            <div class="footer-phone">+7 495 225-20-95</div>
            <div class="footer-email">arenda@kp-16.ru</div>
        </div>
        <div class="footer-text">Москва, ул. Краснопролетарская, 16</div>

        <div class="footer-text "><? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/inc/footer/copyright.php'); ?></div>
    <div class="t-show"></div>
        <div class="footer-copyright"><? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/inc/footer/made-by.php'); ?>
        </div>

</footer>


<? if ($APPLICATION->GetCurDir() != '/location/' && $APPLICATION->GetCurDir() != '/about/' && $APPLICATION->GetCurDir() != '/contacts/') { ?>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script type="text/javascript">
        /*
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 15,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(55.7782682,37.6049166), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#657d90"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#475663"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#657d90"},{"visibility":"on"}]}]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(55.7782682,37.6049166),
                    map: map,
                    title: 'Snazzy!'
                });




            }*/
    </script>
<? } ?>


<? if (!$isDevMode) { ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VCM0B352NR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-VCM0B352NR');
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(76358335, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/76358335" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
<? } ?>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-71728410-1', 'auto');
    ga('send', 'pageview');

</script>
<script>
    (function(w,d,u){
        var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://cdn-ru.bitrix24.ru/b17549862/crm/site_button/loader_2_h3h6o9.js');
</script>


</body>
</html>