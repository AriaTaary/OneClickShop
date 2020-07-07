<div class="account-view">

    <div class="account-menu">
        <?php new \base\View\Element("account_menu") ?>
    </div>

    <div class="account-content">
        <p class="header-text">Заказы</p>
        <div class="orders">

            <!-- Order-position блок нового заказа -->

            <div class="order position">
                <div class="order-header">
                    <p>Заказ № 0000000</p>
                    <p>от 20.20.20</p>
                </div>
                <div class="order-body">
                    <div class="separate-orders">

                        <!-- Position-item блок нового элемента заказа -->

                        <div class=position-item>
                            <img class="basket-product-img" src="/img/logitech-g502-hero-3-1000x1000.jpg" alt="">
                            <div class="position-info">
                                <p class="basket-product-name">Название товара</p>
                                <div class="quantity">
                                    <p class="counter-tag">Количество:</p>
                                    <span class="counter">1</span>
                                </div>
                                <p>0 000 ₽</p>
                            </div>
                        </div>

                    </div>
                    <!-- /.separate-orders -->
                    <div class="order-info">
                        <div class="order-status">
                            <p>Статус товара:</p>
                            <p>Выполнен</p>
                        </div>
                        <div class="order-price">
                            <p>Итого:</p>
                            <p>0 000 ₽</p>
                        </div>
                    </div>
                </div>
                <!-- /.order-body -->
            </div>
            <!-- /.order-position -->


        </div>
        <!-- /.orders -->
    </div>
    <!-- /.account-content -->
</div>
<!-- /.account-view -->