<html>
    <style>
        table { 
            border-spacing: 0;
            border-collapse: collapse;
        }

        table td, table th {
            border: 1px solid #ccc;
            padding: 5px;
        }

        table th {
            background: #eee;
        }
    </style>
    <head>
        <title>Поиск координат</title>

        <script src="//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU" type="text/javascript"></script>




    </head>
    <body>


        <table>
            <th>Адрес</th>
            <th>Широта</th>
            <th>Долгота</th>



            <?php foreach ($collection as $item) :?> 

                <tr>

                    <td><a href="#" onclick="setPoint(<?= $item->getLatitude() ?>, <?= $item->getLongitude() ?>);"><?= $item->getAddress(); ?></a></td>
                    <td><?= $item->getLatitude(); ?></td>
                    <td><?= $item->getLongitude(); ?></td> 


                </tr>
            <?php endforeach; ?>

        </table>



        <br><br>

        <script>



            var myMap;

// Дождёмся загрузки API и готовности DOM.
            ymaps.ready(init);

            function init() {
                // Создание экземпляра карты и его привязка к контейнеру с
                // заданным id ("map").
                myMap = new ymaps.Map('map', {
                    // При инициализации карты обязательно нужно указать
                    // её центр и коэффициент масштабирования.
                    center: [54.83, 37.11],
                    zoom: 5
                });

                //document.getElementById('destroyButton').onclick = function () {
                // Для уничтожения используется метод destroy.
                //  myMap.destroy();
                //};

            }
        </script>


        <div id="map" style="width:900px; height:700px"></div>

        <script>

            function setPoint(a, b) {

                if (typeof myPlacemark !== 'undefined') {
                    myMap.geoObjects.remove(myPlacemark);

                }

                //var a = <?= $item->getLatitude(); ?>;
                //var b = <?= $item->getLongitude(); ?>;


                myPlacemark = new ymaps.Placemark([a, b], {
                    hintContent: "Хинт метки"
                });

                myMap.geoObjects.add(myPlacemark);



            }

        </script>

    </body>
</html>


