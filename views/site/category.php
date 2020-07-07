<?php

/**
 * @var $page base\Page
 * @var $category array
 * @var $products array
 */

use base\View\Element;

$title = $category['name'];
$page->title = "{$title} - OneClick";

?>

<?php new Element("mini_banner") ?>
<?php
new Element("breadcrumb", ["elements" => [
    ['name' => $title]
]])
?>

<div class="new-content">
    <p class="header-text"><?= $category['name'] ?></p>

    <div>
        <ul class="choice">
            <li class="sort">
                <form action="#" class="form-sort">
                    <label for="select-1" class="sort">
                        <p>Сортировать</p>
                        <img class="sort-img" src="/img/sort.png">
                    </label>
                    <select name="sort" id="select-1">
                        <option value="default">По умолчанию</option>
                        <option value="name">По наименованию (А -> Я)</option>
                        <option value="nameRevert">По наименованию (Я -> А)</option>
                        <option value="price">Цена (по возрастанию)</option>
                        <option value="priceRevert">Цена (по убыванию)</option>
                        <option value="rating">Рейтинг (по возрастанию)</option>
                        <option value="ratingRevert">Рейтинг (по убыванию)</option>
                    </select>
                </form>
            </li>

            <div id="filter" class="filter">

                <span class="title-filter">
                    <label for="select-1" class="sort">
                        <p>Фильтр</p>
                        <img class="filter-img" src="/img/filter.png">
                    </label>
                </span>

                <ul>
                    <li>
                        <div class="brand">
                            <p class="brand-title">Бренд:</p>
                            <div>
                                <label for="ch-1">Бренд 1</label>
                                <input type="checkbox" value="1" id="ch-1">
                            </div>
                            <div>
                                <label for="ch-2">Бренд 2</label>
                                <input type="checkbox" value="2" id="ch-2">
                            </div>
                            <div>
                                <label for="ch-3">Бренд 3</label>
                                <input type="checkbox" value="3" id="ch-3">
                            </div>
                            <div>
                                <label for="ch-4">Бренд 4</label>
                                <input type="checkbox" value="4" id="ch-4">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="color">
                            <p class="color-title">Цвет:</p>
                            <div>
                                <label for="ch-1">Черный</label>
                                <input type="checkbox" value="1" id="ch-1">
                            </div>
                            <div>
                                <label for="ch-2">Красный</label>
                                <input type="checkbox" value="2" id="ch-2">
                            </div>
                            <div>
                                <label for="ch-3">Белый</label>
                                <input type="checkbox" value="3" id="ch-3">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="price">
                            <p class="price-title">Цена:</p>
                            <label for="in-1" >От</label>
                            <input class="price-1" type="number" id="in-1">
                            <label for="in-2" >до</label>
                            <input class="price-2" type="number" id="in-2">
                        </div>
                    </li>
                </ul>
            </div>

            <script>
                let menuElem = document.getElementById('filter');
                let titleElem = menuElem.querySelector('.title-filter');

                titleElem.onclick = function() {
                    menuElem.classList.toggle('open');
                };
            </script>
        </ul>
    </div>

    <div class="poduct-list">
        <?php if (empty($products)) : ?>
        <p>Продуктов в этой категории ещё нет :с</p>
        <?php else : ?>
            <ul class="product-page-ul">
                <?php foreach ($products as $product) : ?>
                <li class="product-page-li">
                    <img class="product-img" src="/uploads/<?= $product['image'] ?>">
                    <p class="product-name"><?= $product['name'] ?></p>
                </li>
                <li class="product-page-li">
                    <!-- /.card -->
                    <div class="card product-page-card">
                        <img src="/uploads/<?= $product['image'] ?>" class="card-img">
                        <div class="card-text">
                            <div class="card-heading">
                                <h3 class="card-title card-title-reg"><?= $product['name'] ?></h3>
                            </div>
                            <!-- /.card-heading -->
                            <div class="card-buttons">
                                <button class="button-to-basket">
                                    <span class="button-card-text">В корзину</span>
                                    <img src="/img/basket-2.svg" class="button-card-img">
                                </button>
                                <strong class="card-price-bold">0 000₽</strong>
                            </div>
                        </div>
                        <!-- /.card-text -->
                    </div>
                    <!-- /.card -->
                </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>