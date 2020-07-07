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
        <p style="margin-top: 25px">Администрирование:</p>
        <li class="account-menu-li ">
            <a href="/profile/admin/categories/" class="account-menu-a menu-a">Категории</a>
        </li>
        <li class="account-menu-li ">
            <a href="/profile/admin/brands/" class="account-menu-a menu-a">Бренды</a>
        </li>
        <li class="account-menu-li ">
            <a href="/profile/admin/products/" class="account-menu-a menu-a">Товары</a>
        </li>
    <?php endif; ?>
</ul>