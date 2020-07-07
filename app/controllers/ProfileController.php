<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\AuthComponent;
use app\database\FavouriteProductsTable;
use app\database\UsersTable;
use base\App;
use base\View\View;

class ProfileController extends BaseController
{
    public function orders()
    {
        new View("site/profile/orders", $this->page);
    }

    public function favourites()
    {
        $ft = new FavouriteProductsTable();
        $products = $ft->favourites(App::$session->user->getId());

        new View("site/profile/favourites", $this->page, ['products' => $products]);
    }

    public function settings()
    {
        $usersTable = new UsersTable();
        $user = $usersTable->get("*", ['id' => App::$session->user->getId()])[0];

        new View("site/profile/settings", $this->page, ['user' => $user]);
    }

    public function form()
    {
        $usersTable = new UsersTable();
        $user = $usersTable->get("*", ['id' => App::$session->user->getId()])[0];

        new View("site/profile/form", $this->page, ['user' => $user]);
    }

    public function edit()
    {
        $post = $this->page->getPost();

        $data['name'] = ($post['name'] !== "") ? $post['name'] : null;
        $data['surname'] = ($post['surname'] !== "") ? $post['surname'] : null;
        $data['email'] = ($post['email'] !== "") ? $post['email'] : null;
        $data['phone'] = ($post['phone'] !== "") ? $post['phone'] : null;

        $delete = [];
        foreach ($data as $key => $item) {
            if ($item == null) {
                $delete[] = $key;
            }
        }

        foreach ($delete as $item) {
            unset($data[$item]);
        }

        $table = new UsersTable();

        if (!empty($data)) {
            $table->update($data, ['id' => App::$session->user->getId()]);
        }

        $passwords['old_password'] = ($post['old_password'] !== "") ? $post['old_password'] : null;
        $passwords['new_password'] = ($post['new_password'] !== "") ? $post['new_password'] : null;
        $passwords['new_password_confirm'] = ($post['new_password_confirm'] !== "") ? $post['new_password_confirm'] : null;

        if ($passwords['old_password']) {
            if ($passwords['new_password'] !== $passwords['new_password_confirm']) {
                return new View("errors/password", $this->page, ['message' => "Пароли не совпадают"]);
            }

            $authComponent = new AuthComponent();

            $user_info = $table->get("*", ['id' => App::$session->user->getId()])[0];

            if ($user_info['password'] === $authComponent->generateHashPassword($passwords['old_password'], $user_info['salt'])) {
                $salt = $authComponent->generateSalt();
                $hash = $authComponent->generateHashPassword($passwords['new_password'], $salt);

                $table->update(['password' => $hash, 'salt' => $salt], ['id' => App::$session->user->getId()]);
            }
            else {
                return new View("errors/password", $this->page, ['message' => "Пароль неверный"]);
            }
        }

        header("Location: /profile/settings/");
    }
}