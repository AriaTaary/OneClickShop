<p class="header-text">Оформление заказа</p>
        
<div class="main-content">

    <div class="content-order">

        <div class="forms">

            <form  class="order-form" action="/order/" method="post">
                <div class="form-order-info">
                    <p class="login-name"> Имя:</p>
                    <input id="name" placeholder="Введите имя" name="name" type="text">
                </div>
                <div class="form-order-info">
                <p class="login-name">Телефон:</p>
                    <input id="phone" placeholder="Введите телефон"  name="phone" type="number">
                </div>  
                <div class="form-order-info">
                    <p class="login-name">Email:</p>
                    <input id="email" placeholder="Введите email" name="email" type="email">
                </div>
                <div class="form-order-info">
                    <p class="login-name">Адрес:</p>
                    <input id="address" placeholder="Введите адрес"  name="address" type="text">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet" />
                    <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>

                    <script>
                    $("#address").suggestions({
                    token: "e46187871e0f9c2d03ad9e8bb252e69524c0a664",
                    type: "ADDRESS",
                    onSelect: function(suggestion) {
                    console.log(suggestion);
                    }
                    });
                    </script>
                </div>
                <div class="order-button">
                    <a href="/order/">
                        <button class="button-to-pay" type="submit">Оформить заказ</button>
                    </a>
                </div>
            </form>

        </div>

    

        <div class="map">

        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=2d388866-8d95-4f3e-86af-c21d9700f708" type="text/javascript"></script>
        <!-- <script src="yandexmap.js" type="text/javascript"></script> -->
        <script>
            
            ymaps.ready(init);

function init() {
    var myPlacemark,
        myMap = new ymaps.Map('map', {
            center: [55.753994, 37.622093],
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        });

    // Слушаем клик на карте.
    myMap.events.add('click', function (e) {
        var coords = e.get('coords');

        // Если метка уже создана – просто передвигаем ее.
        if (myPlacemark) {
            myPlacemark.geometry.setCoordinates(coords);
        }
        // Если нет – создаем.
        else {
            myPlacemark = createPlacemark(coords);
            myMap.geoObjects.add(myPlacemark);
            // Слушаем событие окончания перетаскивания на метке.
            myPlacemark.events.add('dragend', function () {
                getAddress(myPlacemark.geometry.getCoordinates());
            });
        }
        getAddress(coords);
    });

    // Создание метки.
    function createPlacemark(coords) {
        return new ymaps.Placemark(coords, {
            iconCaption: 'поиск...'
        }, {
            preset: 'islands#violetDotIconWithCaption',
            draggable: true
        });
    }

    // Определяем адрес по координатам (обратное геокодирование).
    function getAddress(coords) {
        myPlacemark.properties.set('iconCaption', 'поиск...');
        ymaps.geocode(coords).then(function (res) {
            var firstGeoObject = res.geoObjects.get(0);

            myPlacemark.properties
                .set({
                    // Формируем строку с данными об объекте.
                    iconCaption: [
                        // Название населенного пункта или вышестоящее административно-территориальное образование.
                        firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                        // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                        firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                    ].filter(Boolean).join(', '),
                    // В качестве контента балуна задаем строку с адресом объекта.
                    balloonContent: firstGeoObject.getAddressLine()
                });
        });
    }
}


        </script>
        <p class="map-header">Кликните по карте, чтобы узнать свой адрес:</p>
        <div id="map"></div>

    
        </div>

</div>
</div>