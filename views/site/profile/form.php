<?php
/**
 * @var $user
 */
?>

<div class="account-view">

<div class="account-menu">
    <ul class="account-menu-ul menu-ul">
         <li class="account-menu-li ">
            <a href="/profile/orders/" class="account-menu-a menu-a">Заказы</a>
        </li>  
        <li class="account-menu-li ">
            <a href="/profile/favourites/" class="account-menu-a menu-a">Избранное</a>
        </li>
        <li class="account-menu-li ">
            <a href="/profile/settings/" class="account-menu-a menu-a">Настройки аккаунта</a>
        </li>   
    </ul>
</div>



<div class="account-content">
    <p class="header-text">Изменить данные аккаунта</p>
    <div class="orders">
        <div class="account-info">
            <div class="change-info-form">
                <form action="/profile/edit/" method="post">
                    <div class="login-form">
                        <p class="login-name">Введите имя:</p>
                        <input name="name" placeholder="Имя" type="text" value="<?= $user['name'] ?>">
                    </div>
                    <div class="login-form">
                        <p class="login-name">Введите новую фамилию:</p>
                        <input name="surname" placeholder="Фамилия" type="text" value="<?= is_null($user['surname']) ? '' : $user['surname'] ?>">
                    </div>
                    <div class="login-form">
                        <p class="login-name">Введите новый email:</p>
                        <input name="email" placeholder="Email" type="email" value="<?= $user['email'] ?>">
                    </div>
                    <div class="login-form">
                        <p class="login-name">Введите новый телефон:</p>
                        <input name="phone" placeholder="Телефон" type="text" value="<?= is_null($user['phone']) ? '' : $user['phone'] ?>">
                    </div>

<!--                    <div id="blocklogin" class="block-log-in block-open">-->
                    <p class="login-name">Изменить пароль:</p>
                    <div class="login-form">
                        <p class="login-name">Введите старый пароль:</p>
                            <input name="old_password" placeholder="Старый пароль" type="search">
                    </div>
                    <div class="login-form">
                        <p class="login-name">Введите новый пароль:</p>
                        <input name="new_password" placeholder="Новый пароль" type="search">
                    </div>
                    <div class="login-form">
                        <p class="login-name">Повторите новый пароль:</p>
                        <input name="new_password_confirm" placeholder="Повтор пароля" type="search">
                    </div>

                    <button class="login-button">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.orders -->
</div>
<!-- /.account-content -->
</div>
<!-- /.account-view -->


