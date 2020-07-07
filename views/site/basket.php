<?php
/**
 * @var $products
 * @var $sum
 * @var $count
 */
?>

<p class="header-text">Корзина</p>
        
<div class="main-content">

    <p class="basket-header-text">Количество товаров в корзине: <?= $count ?></p>

    <?php foreach ($products as $product) : ?>
    <div class="position">
        <img class="basket-product-img" src="/uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
        <p class="basket-product-name"><?= $product['name'] ?></p>
        <div class="quantity">
            <p class="counter-tag">Количество:</p>
            <div class="product-counter">
                <button class="counter-button" onclick="cart_minus(<?= $product['id'] ?>, 1)">-</button>
                <span class="counter"><?= $product['count'] ?></span>
                <button class="counter-button" onclick="cart(<?= $product['id'] ?>, 1, 'basket')">+</button>
            </div>
        </div>
        <p><?= $product['price'] ?> руб.</p>
    </div>
    <?php endforeach; ?>

    <div class="buttons-basket">
            <div class="price-row">
                <p class="black-text price">Итого</p>
                <p class="black-text"><?= $sum ?> руб.</p>
            </div>

            <div class="order-buttons">
                <?php if ($sum !== 0) : ?>
                <div class="order-button">
                    <a href="/order/">
                            <button class="button-to-pay" type="submit">
                                <div class="button-content">
                                        <span class="button-to-basket-text">Оформить заказ</span>
                                </div>
                            </button>
                    </a>
                </div>
                <?php endif; ?>
                <div class="order-button">
                    <a href="/">
                        <button class="button-to-go"type="submit">
                        <div class="button-content">
                                        <span class="button-to-basket-text">Продолжить покупки</span>
                                </div>
                        </button>
                    </a>
                </div>
            </div>
    </div>

</div>