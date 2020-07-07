<?php

/**
 * @var $page base\Page
 * @var $products array
 */

use base\View\Element;

$page->title = "Поиск - OneClick";

?>

<div class="new-content">
    <div class="poduct-list">
        <?php if (empty($products)) : ?>
            <div class="error-view">
                <p class="category-error">По вашему запросу ничего не найдено</p>
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
