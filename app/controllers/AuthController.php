<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\AuthComponent;
use base\App;
use base\Page;
use base\View\View;

class AuthController extends BaseController
{
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->component = new AuthComponent();
    }

    public function auth()
    {
        $post = $this->page->getPost();
        $email = $post['email'];
        $password = $post['password'];

        $auth = $this->component->auth($email, $password);
        if ($auth) {
            header("Location: /profile/");
        }
        else {
            new View("status/auth_false", $this->page);
        }
    }

    public function register()
    {
        $post = $this->page->getPost();
        $name = $post['name'];
        $email = $post['email'];
        $password = $post['password'];
        $password_confirm = $post['password_confirm'];

        if ($password === $password_confirm) {
            $register = $this->component->register($name, $email, $password);

            if ($register) {
                new View("status/register_true", $this->page);
            }
            else {
                new View("status/register_false", $this->page);
            }
        }
        else {
            new View("status/register_false", $this->page);
        }
    }

    public function logout()
    {
        if (App::$session->user->isAuth()) {
            if ($this->component->logout()) {
                header("Location: /");
            }
        }
        else {
            header("/");
        }
    }
}