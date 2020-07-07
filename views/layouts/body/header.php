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
                <form class="form-search-top" action="/search/" method="get">
                    <button type="submit"><img class="search" src="/img/search_w.png"></button>
                    <input name="s" placeholder="Поиск..." type="search">
                </form>
            </div>
            <!-- <p class="text-white phone-number">+7 777 000 00 00</p>
            <button class="button-call" type="submit"><img class="call">Позвонить</button> -->
        </div>
        <div class="content-bottom">
            <div class="menu menu-desktop">
                <ul class="menu-ul">
                    <li class="menu-li">
                        <a href="/" class="menu-a">Главная</a>
                    </li>  
                    <!-- <li class="menu-li-dropdown">
                        <a href="" class="dropbtn">Каталог</a>
                        <ul class="dropdown-content">
                            тут было пхп
                         </ul>
                    </li> -->
                    <div class="dropdown open menu-li">
                        <a href="" class="dropbtn dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Каталог</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php if (!is_null($categories)) : ?>
                                <?php foreach ($categories as $category) : ?>
                                    <li class="menu-dropdown-li">
                                        <a class="menu-a menu-dropdown-a" href="/category/<?= $category['link'] ?>/"><?= $category['name'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

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

            <nav class="navbar navbar-expand-lg navbar-dark menu-mobile">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav ">
                    <div class="menu-row">
                        <li class="nav-item menu-li">
                            <a href="/" class="menu-a">Главная</a>
                        </li>
                        <li class="nav-item menu-li">
                            <a href="/delivery/" class="menu-a">Доставка и оплата</a>
                        </li>
                        <li class="nav-item menu-li">
                            <a href="/contacts/" class="menu-a">Контакты</a>
                        </li>
                    </div>
                    <div class="menu-row">
                        <ul class="nav-item">
                            <?php if (!is_null($categories)) : ?>
                                <?php foreach ($categories as $category) : ?>
                                    <li class="menu-dropdown-li">
                                        <a class="menu-a" href="/category/<?= $category['link'] ?>/"><?= $category['name'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </ul>
            </div>
        </nav>
        </div>




       







    </div>
</div>