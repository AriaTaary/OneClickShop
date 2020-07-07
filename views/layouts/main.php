<?php

/**
 * @var $page base\Page;
 */

$path = new base\routing\Path();
?>

<!doctype html>
<html lang="ru">

<head>
    <?php echo $page->scripts; ?>
    <?php include $page->meta; ?>
    <?php echo $page->styles; ?>
    <title><?= $page->title; ?></title>

    <?php if ($page->description != '') : ?>
        <meta name="description" content="<?= $page->description; ?>">
    <?php endif; ?>

    <?php if ($page->keywords != '') : ?>
        <meta name="keywords" content="<?= $page->keywords; ?>">
    <?php endif; ?>
</head>

<body>
    <div class="body">
        <header class="header">
            <?php include $page->getHeader(); ?>
        </header>

        <div class="content">
            <?php
            if (!empty($page->getContent()))
                echo $page->getContent();
            ?>
        </div>

        <footer class="footer">
            <?php include $page->getFooter(); ?>
        </footer>
    </div>

    <div class="modal">
        <div class="modal-dialogue">
            <div class="modal-header">
                <button id="login" class="modal-title-log-in link-active">Войти</button>
                <div class="border">|</div>
                <button id="regin" class="modal-title-registration">Зарегестрироваться</button>
                <button class="close">&times;</button>
            </div> 

            <div class="modal-body">

                <div id="blocklogin" class="block-log-in block-open">
                    <form action="/auth/" method="post">
                        <div class="login-form">
                            <p class="login-name">Email:</p>
                            <input name="email" placeholder="Введите email" type="email">
                        </div>
                        <div class="login-form">
                            <p class="login-name">Пароль:</p>
                            <input name="password" placeholder="Введите пароль" type="password">
                        </div>
                        <div class="modal-footer">
                            <div class="footer-buttons">
                                <button class="login-button">Войти</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="blockregin" class="block-reg-in">
                    <form action="/register/" method="post">
                        <div class="login-form">
                            <p class="login-name">Имя:</p>
                            <input name="name" placeholder="Введите имя" type="text">
                        </div>
                        <div class="login-form">
                            <p class="login-name">Email:</p>
                            <input name="email" placeholder="Введите email" type="email">
                        </div>
                        <div class="login-form">
                            <p class="login-name">Пароль:</p>
                            <input name="password" placeholder="Введите пароль" type="password">
                        </div>
                        <div class="login-form">
                            <p class="login-name">Повторите пароль:</p>
                            <input name="password_confirm" placeholder="Введите пароль" type="password">
                        </div>
                        <div class="modal-footer">
                            <div class="footer-buttons">
                                <button class="login-button">Зарегестрироваться</button>
                            </div>
                        </div>
                    </form>
                </div>  
                
            </div>
            <!-- /.modal-body -->
        </div>
        <!-- /.modal-dialogue -->
    </div>
    <!-- /.modal -->

    <script src="/js/script.js"></script>
</body>

</html>