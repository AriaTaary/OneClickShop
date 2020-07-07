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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
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

                <!-- <div id="blocklogin" class="block-log-in block-open"> -->
                    <form id="blocklogin" class="block-log-in block-open" action="/auth/" method="post">
                        <div class="login-form">
                            <p class="login-name">Email:</p>
                            <input name="email" placeholder="Введите email" type="email">
                        </div>
                        <div class="login-form">
                            <p class="login-name">Пароль:</p>
                            <input name="password" placeholder="Введите пароль" type="password">
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="footer-buttons"> -->
                                <button class="login-button enter">Войти</button>
                            <!-- </div> -->
                        </div>
                    </form>
                <!-- </div> -->
                <!-- <div id="blockregin" class="block-reg-in"> -->
                    <form id="blockregin" class="block-reg-in" action="/register/" method="post">
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
                                <button class="login-button registration">Зарегестрироваться</button>
                            </div>
                        </div>
                    </form>
                <!-- </div>   -->
                
            </div>
            <!-- /.modal-body -->
        </div>
        <!-- /.modal-dialogue -->
    </div>
    <!-- /.modal -->

    <script src="/js/script.js"></script>
    <script src="/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>