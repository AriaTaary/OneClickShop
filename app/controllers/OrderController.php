<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\AuthComponent;
use app\components\ProductsComponent;
use app\database\OrderProductsTable;
use app\database\OrdersTable;
use app\database\OrderStatusTable;
use app\database\UsersTable;
use app\database\UserStatusTable;
use app\model\Order;
use app\model\OrderProduct;
use app\model\User;
use base\View\View;

class OrderController extends BaseController
{
    public function basket()
    {
        $cart = $_SESSION['cart'];

        $products = [];
        $price = [];

        $productsComponent = new ProductsComponent();
        foreach ($cart as $id => $count) {
            $product = $productsComponent->getById($id);
            $product['count'] = $count;

            $productSum = $product['price'] * $count;
            $price[] = $productSum;

            $products[] = $product;
        }

        $sum = 0;
        foreach ($price as $item) {
            $sum += $item;
        }

        $count = 0;
        foreach ($cart as $item) {
            $count += $item;
        }

        $_SESSION['cart_sum'] = $sum;

        new View("site/basket", $this->page, ['products' => $products, 'sum' => $sum, 'count' => $count]);
    }

    public function order()
    {
        $cart = $_SESSION['cart'];
        $sum = $_SESSION['cart_sum'];
        // var_dump($cart, $sum);

        new View("site/order", $this->page);
    }

    public function cart()
    {
        $this->page->api = true;

        $post = $this->page->getPost();

        $product_id = $post['product_id'];
        $count = $post['count'];
        $minus = isset($post['minus']) ? $post['minus'] : null;

        $basket = $_SESSION['cart'];

        if ($minus) {
            if (isset($basket[$product_id])) {
                $_SESSION['cart'][$product_id] -= 1;
            }
        }
        else {
            if (isset($basket[$product_id])) {
                $_SESSION['cart'][$product_id] += $count;
            }
            else {
                $_SESSION['cart'][$product_id] = (int) $count;
            }
        }

        echo json_encode(['status' => true]);
    }

    public function purchase()
    {
        $post = $this->page->getPost();
        $name = $post['name'];
        $email = $post['email'];
        $phone = $post['phone'];
        $address = $post['address'];
        $cart = $_SESSION['cart'];
        $sum = $_SESSION['cart_sum'];

        $usersTable = new UsersTable();
        $user = $usersTable->get("*", ['email' => $email]);

        if (!empty($user)) {
            $newUser = false;
            $user = $user[0];
        }
        else {
            $newUser = true;
            $authComponent = new AuthComponent();
            $password = $authComponent->generateSalt();

            $authComponent->register($name, $email, $password);
            $user = $usersTable->get("*", ['email' => $email])[0];
        }

        $orderStatusTable = new OrderStatusTable();
        $status = $orderStatusTable->get("*", ['name' => "Waiting for payment"])[0];

        $order = new Order(date("Y-m-d H:i:s"), $user['id'], $address, $sum, $status['id'], $name, $email, $phone);
        $ordersTable = new OrdersTable();
        if ($ordersTable->insert($order)) {
            $order_id = $ordersTable->getInsertId();
            $orderProductsTable = new OrderProductsTable();
            foreach ($cart as $product_id => $count) {
                $orderProduct = new OrderProduct($order_id, $product_id, $count);
                $orderProductsTable->insert($orderProduct);
            }

            $subject = "Заказ успешно оформлен!";

            $message = "<p>Вы оформили заказ на интернет-магазине OneClick. Скоро с вами свяжется наш менеджер для подтверждения заказа.</p>";
            if ($newUser && $password) {
                $message .= "<p>Для вас также создан аккаунт. Почта: $email, пароль: $password</p>";
            }

            $message = wordwrap($message, 70, "\r\n");
//
//            $headers  = "Content-type: text/html; charset=windows-1251 \r\n";
//            $headers .= "From: oneclick@oneclick.com\r\n";
//            $headers .= "Reply-To: oneclick@oneclick.com\r\n";

            mail($email, $subject, $message);

            $_SESSION['cart'] = [];
            $_SESSION['cart_sum'] = 0;

            new View("errors/order_success", $this->page);
        }
        else {
            new View("errors/order", $this->page);
        }
    }
}