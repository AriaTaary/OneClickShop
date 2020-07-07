<p class="header-text">Название товара</p>

<div class="main-content">
    <div class="product-page">
        <div class="album">
            <div class="container">
                <img id="expandedImg" src="img/mini-banner.png" style="width:30vw;">
            </div>
            <div class="main-product-img">
                <div class="mini-img">
                    <img src="img/logitech-g502-hero-3-1000x1000.jpg" alt="photo-1" onclick="myFunction(this);">
                </div>
                <div class="mini-img">
                    <img src="img/MAD-CATZ-анонс-продаж-Сайт_ydt1-bz.jpg" alt="photo-2" onclick="myFunction(this);">
                </div>
                <div class="mini-img">
                    <img src="img/mini-banner.png" alt="photo-3" onclick="myFunction(this);">
                </div>
                <div class="mini-img">
                    <img src="img/Logo-without.png" alt="photo-4" onclick="myFunction(this);">
                </div>
            </div>
        </div>
        <div class="product-content">
            <p class="normal-text">Код товара: 0000000</p>
            <p class="normal-text">Производитель: Название</p>
            <p class="grey-text">В наличии</p>
            <p class="huge-text">0 000 руб.</p>
            
            <button class="button-to-basket" type="submit">Добавить в корзину</button>
            <!-- <button id="favorite" class="favorite" type="submit" onclick="favorite.innerText = 'Добавлено в избранное'" type="button" value="Добавить в избранное">Добавить в избранное</button> -->
            <!-- <button id="favorite" class="favorite" type="submit" onClick="change()" value="Добавить в избранное">Добавить в избранное</button> -->
            <button id="not-favorite" class="not-favorite is-open" type="submit" value="Добавить в избранное">Добавить в избранное</button>
            <button id="favorite" class="favorite" type="submit" value="Удалить из избранного">Удалить из избранного</button>

            <h2 class="product-info-title">Описание:</h2>
            <p class="product-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias est in voluptatum doloribus voluptatem incidunt, non itaque inventore placeat! Ipsam minus eum officiis cupiditate quo aut quisquam molestiae, et dolorum. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident consequuntur voluptate excepturi, quae officiis deleniti atque. Aliquid, eveniet nam, omnis, ipsum perferendis ducimus vero perspiciatis eligendi totam quae pariatur ad? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias corrupti aperiam reprehenderit iste, iusto numquam ut possimus commodi in vero modi tenetur quia ipsa? Modi labore eum praesentium nemo voluptate! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati accusamus modi totam laborum architecto placeat, corrupti et mollitia illo illum culpa delectus, doloribus odio tempora. Modi, sunt facere! Autem, alias. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse illum possimus dolorum, in nostrum dolores at? Rerum voluptates perspiciatis voluptatum incidunt beatae corporis a natus, deserunt cumque pariatur, at ex? Lorem ipsum dolor sit amet consectetur adipisicing elit. At rem sapiente obcaecati? Eveniet odit blanditiis, at, ab consequatur quasi est sed unde nihil totam autem impedit facilis rerum a! Quis?</Legend></p>

        </div>
        
    </div>

    

</div>




<script>
    function myFunction(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        imgText.innerHTML = imgs.alt;
        expandImg.parentElement.style.display = "block"; }
    </script>


    <!-- <script>
        function change() {
        document.getElementById('favorite').innerHTML = "Добавлено в избранное";
        document.getElementById('favorite').style.backgroundColor = '#ee652b';
        document.getElementById('favorite').style.color = 'white';
        document.getElementById('favorite').style.borderColor = '#ee652b'
        }
    </script> -->


    <div class="footer">
        <div class="footer-content">
            <div class="footer-menu">
                <ul class="footer-list">
                    <li class="list-one">
                        <div class="phone">
                            <img class="phone-img" src="img/телефон.png">
                            <p>+7 777 000 00 00</p>
                            <button class="button-call" type="submit"><img class="call">Позвонить</button>
                        </div>
                        <div class="mail">
                            <img class="mail-img" src="img/почта.png">
                            <p>OneClick@mail.ru</p>
                        </div>
                        <div class="adress">
                            <img class="adress-img" src="img/дом.png">
                            <p>Mocква, метро Электрозаводская, ул. Большая Семеновская, д. 38</p>
                        </div>
                        <img class="visa-img" src="img/виза.png">
                        <img class="mastercard-img" src="img/мастеркард2.png">
                    </li>
                    <li class="list-two">
                        <a href="index.html" class="menu-footer">Главная</a>
                        <a href="" class="menu-footer">Каталог</a>
                        <a href="delivery.html" class="menu-footer">Доставка и Оплата</a>
                        <a href="contacts.html" class="menu-footer">Контакты</a>
                    </li>
                </ul>
            </div>

            <div class="form-search-bottom">
                <form action="" method="get">
                    <button type="submit"><img class="search" src="img/search_w.png"></button>
                    <input name="s" placeholder="Поиск..." type="search">
                </form>
            </div>

            <p class="author">OneClick © 2020</p>
        </div>
    </div>



    <div class="modal">
        <div class="modal-dialogue">
            <div class="modal-header">
                <button id="login" class="modal-title-log-in">Войти</button>
                <div class="border">|</div>
                <button id="regin" class="modal-title-registration">Зарегестрироваться</button>
                <button class="close">&times;</button>
            </div> 

            <div class="modal-body">

                <div id="blocklogin" class="block-log-in block-open">
                    <div class="login-form">
                        <p class="login-name">Email:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Поиск..." type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Пароль:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Поиск..." type="search">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="footer-buttons">
                            <button class="login-button">Войти</button>
                        </div>
                    </div>
                </div>
                <div id="blockregin" class="block-reg-in">
                    <div class="login-form">
                        <p class="login-name">Имя:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Поиск..." type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Email:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Поиск..." type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Пароль:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Поиск..." type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Повторите пароль:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Поиск..." type="search">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="footer-buttons">
                            <button class="login-button">Зарегестрироваться</button>
                        </div>
                    </div>
                </div>  
                
            </div>
            <!-- /.modal-body -->
    
        </div>
        <!-- /.modal-dialogue -->
