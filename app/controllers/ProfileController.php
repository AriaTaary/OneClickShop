<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\AuthComponent;
use app\database\FavouriteProductsTable;
use app\database\ImagesTable;
use app\database\OrderProductsTable;
use app\database\OrdersTable;
use app\database\OrderStatusTable;
use app\database\ProductsTable;
use app\database\UsersTable;
use base\App;
use base\View\View;

class ProfileController extends BaseController
{
    public function orders()
    {
        $ordersTable = new OrdersTable();
        $orders = $ordersTable->get("*", ['user_id' => App::$session->user->getId()]);

        if (!empty($orders)) {
            $orderProductsTable = new OrderProductsTable();
            $productsTable = new ProductsTable();
            $orderStatusTable = new OrderStatusTable();
            $imagesTable = new ImagesTable();

            foreach ($orders as $key => $order) {
                $productIDs = $orderProductsTable->get("*", ['order_id' => $order['id']]);

                $status = $orderStatusTable->get("*", ['id' => $order['status_id']]);
                $order['status'] = $status[0]['runame'];

                $order['products'] = [];
                foreach ($productIDs as $productID) {
                    $product = $productsTable->get("*", ['id' => $productID['product_id']]);

                    if (!empty($product)) {
                        $product = $product[0];

                        $images = $imagesTable->get("*", ['product_id' => $product['id']]);
                        $image = $images[0]['name'];
                        $product['image'] = $image;

                        $order['products'][] = [
                            'product' => $product,
                            'count' => $productID['count']
                        ];
                    }

                    $orders[$key] = $order;
                }
            }
        }

        new View("site/profile/orders", $this->page, ['orders' => $orders]);
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