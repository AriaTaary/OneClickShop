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
                    <div class="login-form">
                        <p class="login-name">Email:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Введите email" type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Пароль:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Введите пароль" type="search">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="footer-buttons">
                            <button class="login-button">Войти</button>
                        </div>
                    </div>
                </div>
                <div id="blockregin" class="block-reg-in">
                    <div class="login-form">
                        <p class="login-name">Имя:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Введите имя" type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Email:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Введите email" type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Пароль:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Введите пароль" type="search">
                        </form>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Повторите пароль:</p>
                        <form action="" method="get">
                            <input name="s" placeholder="Введите пароль" type="search">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="footer-buttons">
                            <button class="login-button">Зарегестрироваться</button>
                        </div>
                    </div>
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