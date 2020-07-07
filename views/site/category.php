<?php

/**
 * @var $page base\Page
 * @var $category array
 * @var $products array
 * @var $sort
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
                <form name="sort" action="/category/<?= $category['link'] ?>/" class="form-sort">
                    <label for="select-1" class="sort">
                        <p>Сортировать</p>
                        <img class="sort-img" src="/img/sort.png">
                    </label>
                    <select name="sort" id="select-1" onchange="submitForm('sort')">
                        <option value="default">По умолчанию</option>
                        <option value="name" <?php if (!is_null($sort) && $sort == "name") :?>selected<?php endif; ?>>По наименованию (А -> Я)</option>
                        <option value="nameRevert" <?php if (!is_null($sort) && $sort == "nameRevert") :?>selected<?php endif; ?>>По наименованию (Я -> А)</option>
                        <option value="price" <?php if (!is_null($sort) && $sort == "price") :?>selected<?php endif; ?>>Цена (по возрастанию)</option>
                        <option value="priceRevert" <?php if (!is_null($sort) && $sort == "priceRevert") :?>selected<?php endif; ?>>Цена (по убыванию)</option>
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

                <form action="/category/<?= $category['link'] ?>/">
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
                            <div class="price">
                                <p class="price-title">Цена:</p>
                                <label for="in-1" >От</label>
                                <input class="price-1" type="number" id="in-1">
                                <label for="in-2" >до</label>
                                <input class="price-2" type="number" id="in-2">
                            </div>
                        </li>
                    </ul>
                </form>
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
            <div class="error-view">
                <p class="category-error">Товаров в данной категории нет</p>
            </div>
        <?php else : ?>
            <ul class="product-page-ul">
                <?php foreach ($products as $product) : ?>
                <li class="product-page-li">
                    <!-- /.card -->
                    <a href="/products/<?= $product['article'] ?>/">
                        <div class="card product-page-card">
                            <img src="/uploads/<?= $product['image'] ?>" class="card-img">
                            <div class="card-text">
                                <div class="card-heading">
                                    <h3 class="card-title card-title-reg"><?= $product['name'] ?></h3>
                                </div>
                                <!-- /.card-heading -->
                                <div class="card-buttons">
                                    <a href="/products/" class="links">
                                    <button class="button-to-basket">
                                        <span class="button-card-text">В корзину</span>
                                        <img src="/img/basket-2.svg" class="button-card-img">
                                    </button>
                                    </a>
                                    <strong class="card-price-bold"><?= $product['price'] ?>₽</strong>
                                </div>
                            </div>
                            <!-- /.card-text -->
                        </div>
                    </a>
                    <!-- /.card -->
                </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>