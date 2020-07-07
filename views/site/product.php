<?php
/**
 * @var $product
 * @var $images
 */
?>

<p class="header-text"><?= $product['name'] ?></p>

<div class="main-content">
    <div class="product-page">
        <div class="album">
            <div class="container">
                <img id="expandedImg" src="/uploads/<?= $images[0]['name'] ?>" style="width:30vw;">
            </div>
            <div class="main-product-img">
                <?php foreach ($images as $key => $image) : ?>
                    <div class="mini-img">
                        <img src="/uploads/<?= $image['name'] ?>" alt="photo-<?= $key + 1 ?>" onclick="myFunction(this);">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="product-content">
            <p class="normal-text">Код товара: <?= $product['article'] ?></p>
            <p class="normal-text">Производитель: <?= $product['brand'] ?></p>
            <p class="grey-text">В наличии</p>
            <p class="huge-text"><?= $product['price'] ?> руб.</p>
            
            <button class="button-to-basket" type="submit">Добавить в корзину</button>
            <!-- <button id="favorite" class="favorite" type="submit" onclick="favorite.innerText = 'Добавлено в избранное'" type="button" value="Добавить в избранное">Добавить в избранное</button> -->
            <!-- <button id="favorite" class="favorite" type="submit" onClick="change()" value="Добавить в избранное">Добавить в избранное</button> -->
            <button id="not-favorite" class="not-favorite is-open" type="submit" value="Добавить в избранное">Добавить в избранное</button>
            <button id="favorite" class="favorite" type="submit" value="Удалить из избранного">Удалить из избранного</button>

            <h2 class="product-info-title">Описание:</h2>
            <p class="product-info"><?= $product['description'] ?></p>
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
