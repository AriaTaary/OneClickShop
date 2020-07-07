<?php
/** @var $products */
?>

<div class="account-view">

    <div class="account-menu">
        <?php new \base\View\Element("account_menu") ?>
    </div>

    <div class="account-content">
        <p class="header-text">Избранное</p>

        <?php if (!$products) : ?>

        <?php else : ?>
        <div class="orders">

            <!-- Избранная позиция -->
            <?php foreach ($products as $product) : ?>
            <div class="position">
                <img class="basket-product-img" src="/uploads/<?= $product['image'] ?>" alt="">
                <a href="/products/<?= $product['article'] ?>/">
                    <p class="basket-product-name"><?= $product['name'] ?></p>
                </a>
                <p><?= $product['price'] ?> руб.</p>
                <div class="orders-buttons">
                    <button class="button-to-basket" type="submit" onclick="cart(<?= $product['id'] ?>, 1)">Добавить в корзину</button>
                    <button id="favorite" class="not-favorite is-open" value="Удалить из избранного" onclick="favourite(<?= $product['id'] ?>, <?= \base\App::$session->user->getId() ?>)">Удалить из избранного</button>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- /.position -->

<!--            <script>-->
<!--                const notFavorite = document.querySelector("#not-favorite");-->
<!--                const favorite = document.querySelector("#favorite");-->
<!---->
<!--                notFavorite.addEventListener("click", function(event){-->
<!--                    notFavorite.classList.remove('is-open');-->
<!--                    favorite.classList.add('is-open');-->
<!--                });-->
<!---->
<!--                favorite.addEventListener("click", function(event){-->
<!--                    favorite.classList.remove('is-open');-->
<!--                    notFavorite.classList.add('is-open');-->
<!--                });-->
<!--            </script>-->
        </div>
        <?php endif; ?>

    </div>
    <!-- /.account-content -->
</div>
<!-- /.account-view -->