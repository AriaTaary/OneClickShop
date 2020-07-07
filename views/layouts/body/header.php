<?php

use app\components\CategoriesComponent;

$categoriesComponent = new CategoriesComponent();
$categories = $categoriesComponent->getAll();

?>

<div class="header-content">
    <div class="logo">
        <a href="/">
            <img src="/img/Logo-without.png" class="logo-img">
        </a>
    </div>
    <div class="header-main">
        <div class="content-top">
            <div class="form-search-top">
                <form action="/search/" method="get">
                    <button type="submit"><img class="search" src="/img/search_w.png"></button>
                    <input name="s" placeholder="Поиск..." type="search">
                </form>
            </div>
            <!-- <p class="text-white phone-number">+7 777 000 00 00</p>
            <button class="button-call" type="submit"><img class="call">Позвонить</button> -->
        </div>
        <div class="content-bottom">
            <div class="menu">
                <ul class="menu-ul">
                    <li class="menu-li">
                        <a href="/" class="menu-a">Главная</a>
                    </li>  
                    <li class="menu-li-dropdown">
                        <a href="" class="dropbtn">Каталог</a>
                        <ul class="dropdown-content">
                            <?php if (!is_null($categories)) : ?>
                                <?php foreach ($categories as $category) : ?>
                                    <li>
                                        <a href="/category/<?= $category['link'] ?>/"><?= $category['name'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                         </ul>
                    </li>
                    <li class="menu-li">
                        <a href="/delivery/" class="menu-a">Доставка и оплата</a>
                    </li>  
                    <li class="menu-li">
                        <a href="/contacts/" class="menu-a">Контакты</a>
                    </li>
                </ul>
            </div>
            <a href="/basket/">
                <button class="button-basket" type="submit"><img class="basket" src="/img/basket.png"></button>
            </a>
            <?php if (\base\App::$session->user->isAuth()) : ?>
                <a href="/profile/">
                    <button class="button-person"><img class="person" src="/img/person.png"></button>
                </a>
            <?php else : ?>
            <button id="person-button" class="button-person" type="submit"><img class="person" src="/img/person.png"></button>
            <?php endif; ?>
        </div>
    </div>
</div>