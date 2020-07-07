<?php

$database = (file_exists(__DIR__ . "/database_local.php")) ? require __DIR__ . "/database_local.php" : require __DIR__ . "/database.php";

return [
    /** Название проекта */
    'name' => 'ErrCode Base Project',

    /** Относительные ссылки на главную страницу и страницу авторизации */
    'homeUrl' => '/',
    'authUrl' => '/',

    'database' => $database,

    /** Названия файлов стилей из public_html/css/, которые нужно подключить */
    'styles' => [
        'main.css',
        'fonts.css',
        'media.css',
        'animate.css',
    ],

    /** Названия скриптовых файлов из public_html/js/, которые нужно подключить */
    'scripts' => [
        // 'script.js',
        'jquery.js',
        'forms.js',
        'yandexmap.js',
        'wow.min.js',
    ],

    /** Ссылка на favicon относительно public_html/ */
    'favicon' => '',

    'errors' => [
        404 => 'errors/404',
        'access' => 'errors/access'
    ],
];