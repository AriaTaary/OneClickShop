<?php


namespace app\base;


use app\components\AuthComponent;
use base\controllers\Controller;

abstract class BaseController extends Controller
{
    /**
     *  Проверка токена авторизации в COOKIE.
     *
     *  TODO: Если авторизация в вашем веб-приложении происходит без помощи
     *  TODO: COOKIE, удалите этот метод.
     */
    protected function checkAuthToken()
    {
        if (isset($_COOKIE['auth_token']) && !empty($_COOKIE['auth_token'])) {
            $component = new AuthComponent();
            $component->setSession($_COOKIE['auth_token']);
        }
    }
}