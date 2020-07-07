<ul class="account-menu-ul menu-ul">
    <li class="account-menu-li ">
        <a href="/profile/" class="account-menu-a menu-a">Заказы</a>
    </li>
    <li class="account-menu-li ">
        <a href="/profile/favourites/" class="account-menu-a menu-a">Избранное</a>
    </li>
    <li class="account-menu-li ">
        <a href="/profile/settings/" class="account-menu-a menu-a">Настройки аккаунта</a>
    </li>
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
    <li class="account-menu-li ">
        <a href="" class="account-menu-a menu-a menu-exit"><button class="login-button enter">Выйти</button></a>
    </li>
</ul>