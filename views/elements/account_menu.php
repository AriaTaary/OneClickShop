<ul class="account-menu-ul menu-ul">
    <div class="account-menu-element">
    <p class="profile-category account-exit-mobile">Основное:</p>
    <li class="account-menu-li ">
        <a href="/profile/" class="account-menu-a menu-a">Заказы</a>
    </li>
    <li class="account-menu-li ">
        <a href="/profile/favourites/" class="account-menu-a menu-a">Избранное</a>
    </li>
    <li class="account-menu-li ">
        <a href="/profile/settings/" class="account-menu-a menu-a">Настройки аккаунта</a>
    </li>
    <li class="account-menu-li account-exit-mobile">
        <a href="" class="account-menu-a menu-a menu-exit"><button class="login-button enter"><span class="button-to-basket-text">Выйти</span></button></a>
    </li>
    </div>
    <div class="account-menu-element">
    <?php if (\base\App::$session->user->getRole() == "moderator" || \base\App::$session->user->getRole() == "administrator") : ?>
        <p class="profile-category">Администрирование:</p>
        <li class="account-menu-li ">
            <a href="/profile/admin/products/" class="account-menu-a menu-a">Все товары</a>
        </li>
        <li class="account-menu-li ">
            <a href="/profile/admin/orders/" class="account-menu-a menu-a">Все заказы</a>
        </li>
    <?php endif; ?>
    <?php if (\base\App::$session->user->getRole() == "administrator") : ?>
        <li class="account-menu-li ">
            <a href="/profile/admin/categories/" class="account-menu-a menu-a">Все категории</a>
        </li>
        <li class="account-menu-li ">
            <a href="/profile/admin/brands/" class="account-menu-a menu-a">Все бренды</a>
        </li>
        <li class="account-menu-li ">
            <a href="/profile/admin/sponsors/" class="account-menu-a menu-a">Все спонсоры</a>
        </li>
    <?php endif; ?>
    </div>
    <div class="account-menu-element">
    <li class="account-menu-li account-exit">
        <a href="" class="account-menu-a menu-a menu-exit"><button class="login-button enter">Выйти</button></a>
    </li>
    </div>
</ul>