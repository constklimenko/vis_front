$(document).ready(function () {
    if(window.location.pathname === '/contacts/') {
        let script = document.createElement('script');
        script.src = 'https://api-maps.yandex.ru/2.1/?lang=ru_RU';
        script.async = true;
        script.onload = function () {
            ymaps.ready(function () {
                var myMap, myPlacemark;
                myMap = new ymaps.Map("map2", {
                    center: [55.77717, 37.607116],
                    zoom: 17
                });
                myPlacemark = new ymaps.Placemark([55.77717, 37.607116], {
                    hintContent: 'Москва, Краспролетарская ул., д.16',
                    balloonContent: ''
                });

                myMap.geoObjects.add(myPlacemark);

                //Зарисовываем здание
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
                    properties: {
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


                var myPlacemark2 = new ymaps.GeoObject({
                    // Описываем геометрию геообъекта.
                    geometry: {
                        // Тип геометрии - "Ломаная линия".
                        type: "LineString",
                        // Указываем координаты вершин ломаной.
                        coordinates: [
                            [55.790853, 37.589545],
                            [55.78410, 37.59672],
                            [55.784821, 37.6012],
                            [55.7851, 37.6017],
                            [55.78525, 37.6037]
                        ]
                    },
                    // Описываем свойства геообъекта.
                    properties: {
                        // Содержимое хинта.
                        hintContent: "Автомобилем"

                    }
                }, {
                    // Задаем опции геообъекта.
                    // Включаем возможность перетаскивания ломаной.
                    draggable: false,
                    // Цвет линии.
                    strokeColor: "#00AFC7",
                    // Ширина линии.
                    strokeWidth: 5
                });

                // Создаем ломаную с помощью вспомогательного класса Polyline.
                var myPolyline = new ymaps.Polyline([
                    // Указываем координаты вершин ломаной.
                    [55.7925, 37.59933],
                    [55.7879, 37.60059],
                    [55.7851, 37.6017]

                ], {
                    // Описываем свойства геообъекта.
                    // Содержимое балуна.
                    balloonContent: "Ломаная линия"
                }, {
                    // Задаем опции геообъекта.
                    // Отключаем кнопку закрытия балуна.
                    balloonCloseButton: false,
                    // Цвет линии.
                    strokeColor: "#00AFC7",
                    // Ширина линии.
                    strokeWidth: 4,
                    // Коэффициент прозрачности.
                    strokeOpacity: 1
                });
                var myPolyline2 = new ymaps.Polyline([
                    // Указываем координаты вершин ломаной.
                    [55.7926, 37.6043],

                    [55.78525, 37.6037]

                ], {
                    // Описываем свойства геообъекта.
                    // Содержимое балуна.
                    balloonContent: ""
                }, {
                    // Задаем опции геообъекта.
                    // Отключаем кнопку закрытия балуна.
                    balloonCloseButton: false,
                    // Цвет линии.
                    strokeColor: "#00AFC7",
                    // Ширина линии.
                    strokeWidth: 4,
                    // Коэффициент прозрачности.
                    strokeOpacity: 1
                });
                var myPolyline3 = new ymaps.Polyline([
                    // Указываем координаты вершин ломаной.
                    [55.784821, 37.6012],
                    [55.7799, 37.6021],
                    [55.77875, 37.6039],
                    [55.7791, 37.60551],
                    [55.77345, 37.60885]

                ], {
                    // Описываем свойства геообъекта.
                    // Содержимое балуна.
                    balloonContent: ""
                }, {
                    // Задаем опции геообъекта.
                    // Отключаем кнопку закрытия балуна.
                    balloonCloseButton: false,
                    // Цвет линии.
                    strokeColor: "#00AFC7",
                    // Ширина линии.
                    strokeWidth: 4,
                    // Коэффициент прозрачности.
                    strokeOpacity: 1
                });
                var myPolyline4 = new ymaps.Polyline([
                    // Указываем координаты вершин ломаной.
                    [55.78525, 37.6037],
                    [55.784, 37.60437],
                    [55.7825, 37.60677],
                    [55.7808, 37.6085],
                    [55.78035, 37.605],
                    [55.7791, 37.60551]

                ], {
                    // Описываем свойства геообъекта.
                    // Содержимое балуна.
                    balloonContent: ""
                }, {
                    // Задаем опции геообъекта.
                    // Отключаем кнопку закрытия балуна.
                    balloonCloseButton: false,
                    // Цвет линии.
                    strokeColor: "#00AFC7",
                    // Ширина линии.
                    strokeWidth: 4,
                    // Коэффициент прозрачности.
                    strokeOpacity: 1
                });

                var myPolyline5 = new ymaps.Polyline([
                    // Указываем координаты вершин ломаной.
                    [55.7791, 37.6092],
                    [55.777, 37.6082],
                    [55.7767, 37.607]


                ], {
                    // Описываем свойства геообъекта.
                    // Содержимое балуна.
                    balloonContent: ""
                }, {
                    // Задаем опции геообъекта.
                    // Отключаем кнопку закрытия балуна.
                    balloonCloseButton: false,
                    // Цвет линии.
                    strokeColor: "#00AFC7",
                    // Ширина линии.
                    strokeWidth: 4,
                    // Коэффициент прозрачности.
                    strokeOpacity: 1
                });


                // Добавляем линии на карту.


                var metro1 = new ymaps.Polyline([
                    // Указываем координаты вершин ломаной.
                    [55.78145, 37.6143],
                    [55.78028, 37.605],
                    [55.7767, 37.6072]


                ], {
                    // Описываем свойства геообъекта.
                    // Содержимое балуна.
                    balloonContent: ""
                }, {
                    // Задаем опции геообъекта.
                    // Отключаем кнопку закрытия балуна.
                    balloonCloseButton: false,
                    // Цвет линии.
                    strokeColor: "#99ff99",
                    // Ширина линии.
                    strokeWidth: 4,
                    // Коэффициент прозрачности.
                    strokeOpacity: 1
                });

                var metro2 = new ymaps.Polyline([
                    // Указываем координаты вершин ломаной.
                    [55.7792, 37.6015],
                    [55.77959, 37.60259],
                    [55.7788, 37.6039],


                    [55.7792, 37.6055],


                    [55.7767, 37.6071]


                ], {
                    // Описываем свойства геообъекта.
                    // Содержимое балуна.
                    balloonContent: ""
                }, {
                    // Задаем опции геообъекта.
                    // Отключаем кнопку закрытия балуна.
                    balloonCloseButton: false,
                    // Цвет линии.
                    strokeColor: "#9b2d30",
                    // Ширина линии.
                    strokeWidth: 4,
                    // Коэффициент прозрачности.
                    strokeOpacity: 1
                });


                var metro3 = new ymaps.Polyline([
                    // Указываем координаты вершин ломаной.
                    [55.7818, 37.5988],
                    [55.779, 37.601],
                    [55.77952, 37.60259],
                    [55.77875, 37.6039],


                    [55.7791, 37.60548],


                    [55.7767, 37.607]


                ], {
                    // Описываем свойства геообъекта.
                    // Содержимое балуна.
                    balloonContent: ""
                }, {
                    // Задаем опции геообъекта.
                    // Отключаем кнопку закрытия балуна.
                    balloonCloseButton: false,
                    // Цвет линии.
                    strokeColor: "#808080",
                    // Ширина линии.
                    strokeWidth: 4,
                    // Коэффициент прозрачности.
                    strokeOpacity: 1
                });


                $('.way-list li').on('click', 'a', function () {
                    myMap.geoObjects.removeAll();
                    myMap.geoObjects.add(myPlacemark);
                    if ($(this).parent().hasClass('car')) {

                        myMap.geoObjects
                            .add(myPlacemark2)
                            .add(myPolyline)
                            .add(myPolyline3)
                            .add(myPolyline4)
                            .add(myPolyline5)
                            .add(myPolyline2);
                    } else {
                        myMap.geoObjects
                            .add(metro1)
                            .add(metro2)
                            .add(metro3);
                    }

                    $('.way-list li a').each(function () {
                        $(this).removeClass('activ');
                    });
                    $(this).addClass('activ');
                    return false;
                });


            });
        }
        document.body.appendChild(script);
    }
})