<?php
/**
 * @var $orders
 */
?>

<div class="account-view">

    <div class="account-menu">
        <?php new \base\View\Element("account_menu") ?>
    </div>

    <div class="account-content">
        <p class="header-text">Заказы</p>

        <div class="orders">
            <?php if (empty($orders)) : ?>
                <p>Заказов пока нет</p>
            <?php else : ?>

                <?php foreach ($orders as $order) : ?>
                <?php
                    $time = strtotime($order['date']);
                    $order['date'] = date("d.m.Y H:i", $time);
                ?>

                <div class="order position">
                    <div class="order-header">
                        <p>Заказ № <?= $order['id'] ?></p>
                        <p>от <?= $order['date'] ?></p>
                    </div>
                    <div class="order-body">
                        <div class="separate-orders">

                            <?php foreach ($order['products'] as $product) : ?>
                                <div class=position-item>
                                    <img class="basket-product-img" src="/uploads/<?= $product['product']['image'] ?>" alt="">
                                    <div class="position-info">
                                        <p class="basket-product-name"><?= $product['product']['name'] ?></p>
                                        <div class="quantity">
                                            <p class="counter-tag">Количество:</p>
                                            <span class="counter"><?= $product['count'] ?></span>
                                        </div>
                                        <p><?= $product['product']['price'] ?> ₽</p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- /.separate-orders -->
                        <div class="order-info">
                            <div class="order-status">
                                <p>Статус товара:</p>
                                <p><?= $order['status'] ?></p>
                            </div>
                            <div class="order-price">
                                <p>Итого:</p>
                                <p><?= $order['sum'] ?> ₽</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.order-body -->
                </div>
                <!-- /.order-position -->
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- /.account-content -->
</div>
<!-- /.account-view -->