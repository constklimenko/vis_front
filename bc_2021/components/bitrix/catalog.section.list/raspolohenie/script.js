
$(function() {
    function setHeiHeight()
    {
        $('.map-wrapper_2').css({
            height: (parseInt($(window).height())-74) + 'px'
        });
        $('.b-map').css({
            height: (parseInt($(window).height())-74) + 'px'
        });
        $('.map-content').css({
            width: (parseInt($(window).width())-385) + 'px'
        });
    }
    setHeiHeight(); // устанавливаем высоту окна при первой загрузке страницы
    $(window).resize( setHeiHeight ); // обновляем при изменении размеров окна
    
    ymaps && ymaps.ready(function()
    {
        var myMap, myPlacemark;

        myMap = new ymaps.Map("map", {
            center: [55.77717, 37.607116],
            zoom: 18	});


        myPlacemark = new ymaps.Placemark([55.77717, 37.607116], {
            hintContent: 'Москва, Краспролетарская ул., д.16',
            balloonContent: ''
        });

        myMap.geoObjects.add(myPlacemark);


        function show_contur(){
            // Создаем многоугольник, используя класс GeoObject.
            var myGeoObject = new ymaps.GeoObject({
                // Описываем геометрию геообъекта.
                geometry: {
                    // Тип геометрии - "Многоугольник".
                    type: "Polygon",
                    // Указываем координаты вершин многоугольника.
                    coordinates: [
                        // Координаты вершин внешнего контура.
                        [
                            [55.778190, 37.606553],
                            [55.778392, 37.607350],
                            [55.77879, 37.607105],
                            [55.77889, 37.607565],
                            [55.778422, 37.607885],
                            [55.778282, 37.607289],
                            [55.777278, 37.607943],
                            [55.77710, 37.607999],
                            [55.7769, 37.607189],
                            [55.7778, 37.6066710],
                            [55.77782, 37.6067910]
                        ]
                    ],
                    // Задаем правило заливки внутренних контуров по алгоритму "nonZero".
                    fillRule: "nonZero"
                },
                // Описываем свойства геообъекта.
                properties:{
                    // Содержимое балуна.
                    balloonContent: "Дом"
                }
            }, {
                // Описываем опции геообъекта.
                // Цвет заливки.
                fillColor: '#1ccae1',
                // Цвет обводки.
                strokeColor: '#1ccae1',
                // Общая прозрачность (как для заливки, так и для обводки).
                opacity: 0.5,
                // Ширина обводки.
                strokeWidth: 1,
                // Стиль обводки.
                strokeStyle: 'shortdash'
            });
            console.log(myGeoObject);
            // Добавляем многоугольник на карту.
            myMap.geoObjects.add(myGeoObject);


        }

        var el=$('.map-sidebar li.active.map-link');
        var id1=el.find('a').data('id');

        $.ajax({
            type: "POST",
            url: "/ajax/set_map_point.php",
            dataType: 'json',
            data: {id:id1},
            success: function(msg)
            {
                myMap.geoObjects.removeAll();
                msg.forEach(function(entry)
                {
                    myPlacemark = new ymaps.Placemark([entry.DOLGOTA, entry.SHIROTA], {
                        hintContent: entry.NAME,
                        balloonContent: entry.DESCRIPTION
                    }, {
                        // Опции.
                        // Необходимо указать данный тип макета.
                        iconLayout: 'default#image',
                        // Своё изображение иконки метки.
                        iconImageHref: entry.PICTURE_SRC,
                        // Размеры метки.
                        iconImageSize: [40, 40],
                        // Смещение левого верхнего угла иконки относительно
                        // её "ножки" (точки привязки).
                        //iconImageOffset: [-3, -42]
                    });

                    myMap.geoObjects.add(myPlacemark);

                });
                show_contur();

            }
        });

        $('body').on('click','.map-sidebar li a',function()
        {
            $('.map-sidebar li').each(function()
            {
                $(this).removeClass('active map-link');
            });
            $(this).parent().addClass('active map-link');
            var id=$(this).data('id');
            $.ajax({
                type: "POST",
                url: "/ajax/set_map_point.php",
                dataType: 'json',
                data: {id:id},
                success: function(msg)
                {
                    myMap.geoObjects.removeAll();
                    msg.forEach(function(entry)
                    {
                        myPlacemark = new ymaps.Placemark([entry.DOLGOTA, entry.SHIROTA], {
                            hintContent: entry.NAME,
                            balloonContent: entry.DESCRIPTION
                        }, {
                            // Опции.
                            // Необходимо указать данный тип макета.
                            iconLayout: 'default#image',
                            // Своё изображение иконки метки.
                            iconImageHref: entry.PICTURE_SRC,
                            // Размеры метки.
                            iconImageSize: [40, 40],
                            // Смещение левого верхнего угла иконки относительно
                            // её "ножки" (точки привязки).
                            //iconImageOffset: [-3, -42]
                        });

                        myMap.geoObjects.add(myPlacemark);
                    });
                    show_contur();
                }
            });
        })
    });
})