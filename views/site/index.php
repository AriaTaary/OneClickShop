<?php

/**
 * @var $page base\Page;
 * @var $products array
 * @var $categories array
 */

$page->title = "OneClick - интернет-магазин компьютерной техники";
$page->description = "OneClick - интернет-магазин компьютерной техники. Компьютеры, ноутбуки, мышки, клавиатуры и многое другое в постоянно обновляющемся каталоге.";
$page->keywords = "oneclick, компьютеры, интернет-магазин";

?>

<div class="all">
    <input checked type="radio" name="respond" id="desktop">
    <article id="slider">
        <input checked type="radio" name="slider" id="switch1">
        <input type="radio" name="slider" id="switch2">
        <input type="radio" name="slider" id="switch3">
        <div id="slides">
            <div id="overflow">
                <div class="image">
                    <article><img src="/img/Zowie-скидка.jpg"></article>
                    <article><img src="/img/MAD-CATZ-анонс-продаж-Сайт_ydt1-bz.jpg"></article>
                    <article><img src="/img/HyperX-Cloud.jpg"></article>
                </div>
            </div>
        </div>
        <div id="controls">
            <label for="switch1"></label>
            <label for="switch2"></label>
            <label for="switch3"></label>
        </div>
        <div id="active">
            <label for="switch1"></label>
            <label for="switch2"></label>
            <label for="switch3"></label>
        </div>
    </article>
</div>

<div class="new-content">
    <p class="header-text">Новинки</p>
    <div class="layer">
        <div class="poduct-list">
            <ul class="product-ul">
                <?php foreach ($products as $product) : ?>
                    <li class="product-li">
                        <!-- /.card -->
                        <div class="card">
                            <img src="/uploads/<?= $product['image'] ?>" alt="" class="card-img">
                            <div class="card-text">
                                <div class="card-heading">
                                    <h3 class="card-title card-title-reg"><?= $product['name'] ?></h3>
                                </div>
                                <!-- /.card-heading -->
                                <div class="card-buttons">
                                    <button class="button-to-basket">
                                        <span>В корзину</span>
                                        <img src="/img/basket-2.svg" alt="" class="button-card-img">
                                    </button>
                                    <strong class="card-price-bold"><?= $product['price'] ?>₽</strong>
                                </div>
                            </div>
                            <!-- /.card-text -->
                        </div>
                        <!-- /.card -->
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<div class="category-content">
    <p class="header-text">Категории</p>
    <div class="layer">
        <div class="poduct-list">
            <ul class="product-ul">
                <?php foreach ($categories as $category) : ?>
                    <li class="product-li">
                        <!-- /.card -->
                        <div class="card">
                            <img src="/uploads/<?= $category['image'] ?>" alt="" class="card-img">
                            <div class="card-text">
                                <div class="card-heading">
                                    <h3 class="card-title card-title-reg"><?= $category['name'] ?></h3>
                                </div>
                                <!-- /.card-heading -->
                                <div class="card-buttons">
                                    <a href="/category/<?= $category['link'] ?>/" class="button-card-text">
                                        <button class="button-to-category">Перейти</button>
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-text -->
                        </div>
                        <!-- /.card -->
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<div class="sponsor-content">
    <p class="header-text">Спонсоры</p>
    <div class="sponsors">
        <div class="poduct-list">
            <ul class="product-ul">
                <li class="product-li">
                    <img class="sponsor-img" src="/img/hyperx.png">
                    <!-- <p class="sponsor-name">Название</p> -->
                </li>
                <li class="product-li">
                    <img class="sponsor-img" src="/img/hyperx.png">
                    <!-- <p class="sponsor-name">Название</p> -->
                </li>
                <li class="product-li">
                    <img class="sponsor-img" src="/img/hyperx.png">
                    <!-- <p class="sponsor-name">Название</p> -->
                </li>
                <li class="product-li">
                    <img class="sponsor-img" src="/img/hyperx.png">
                    <!-- <p class="sponsor-name">Название</p> -->
                </li>
            </ul>
        </div>
    </div>
</div>





</div>