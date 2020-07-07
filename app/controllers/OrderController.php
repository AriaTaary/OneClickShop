<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\ProductsComponent;
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

        $_SESSION['cart_sum'] = $sum;

        new View("site/basket", $this->page, ['products' => $products, 'sum' => $sum]);
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
}