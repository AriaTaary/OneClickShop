<?php
/**
 * @var $product
 * @var $images
 * @var $favourite
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


            <button class="button-to-basket button-to-basket-product" onclick="cart(<?= $product['id'] ?>, 1)">
            <div class="button-content">
                                            <span class="button-to-basket-text">В корзину</span>
                                            <img src="/img/basket-2.svg" alt="" class="button-card-img">
                                            </div>
                                        </button>

            <!-- <button class="button-to-basket" type="submit" onclick="cart(<?= $product['id'] ?>, 1)">Добавить в корзину</button> -->
            <!-- <button id="favorite" class="favorite" type="submit" onclick="favorite.innerText = 'Добавлено в избранное'" type="button" value="Добавить в избранное">Добавить в избранное</button> -->
            <!-- <button id="favorite" class="favorite" type="submit" onClick="change()" value="Добавить в избранное">Добавить в избранное</button> -->

            <?php if ($favourite !== null) : ?>
                <?php if ($favourite === true) : ?>
                    <button id="favorite" class="favorite is-open" value="Удалить из избранного" onclick="favourite(<?= $product['id'] ?>, <?= \base\App::$session->user->getId() ?>)">  <span class="button-to-basket-text">Удалить из избранного</span></button>
                <?php else : ?>
                    <button id="not-favorite" class="not-favorite is-open" value="Добавить в избранное" onclick="favourite(<?= $product['id'] ?>, <?= \base\App::$session->user->getId() ?>)"><span class="button-to-basket-text">Добавить в избранное</span></button>
                <?php endif; ?>
            <?php endif; ?>

            <!-- <button id="not-favorite" class="not-favorite is-open" type="submit" value="Добавить в избранное">Добавить в избранное</button>
                    <button id="favorite" class="favorite" type="submit" value="Удалить из избранного">Удалить из избранного</button> -->


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
             const notFavorite = document.querySelector("#not-favorite");
            const favorite = document.querySelector("#favorite");
            // const addF = document.querySelector(".not-favorite");
            // const removeF = document.querySelector(".favorite");

            notFavorite.addEventListener("click", function(event){
                console.log("notHI!");
                notFavorite.classList.remove('is-open');
                favorite.classList.add('is-open');
                // addF.classList.add('favorite');
                // addF.classList.remove('not-favorite');
            });

            favorite.addEventListener("click", function(event){
                console.log("notHI!");
                favorite.classList.remove('is-open');
                notFavorite.classList.add('is-open');
                // addF.classList.add('favorite');
                // addF.classList.remove('not-favorite');
            });
    </script> -->

    