<?php


namespace app\controllers\admin;


use app\base\AdminController;
use app\components\ProductsComponent;
use app\database\OrderProductsTable;
use app\database\OrdersTable;
use app\database\OrderStatusTable;
use base\Page;
use base\View\View;

class OrdersController extends AdminController
{
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->component = new ProductsComponent();
    }

    public function all()
    {
        $ordersTable = new OrdersTable();
        $orders = $ordersTable->get("*");

        $orderStatusTable = new OrderStatusTable();
        foreach ($orders as $key => $order) {
            $time = strtotime($order['date']);
            $orders[$key]['date'] = date("d.m.Y H:i:s", $time);
            $orders[$key]['status'] = $orderStatusTable->get("*", ['id' => $order['status_id']])[0]['runame'];
        }

        new View("admin/orders/all", $this->page, ['data' => $orders]);
    }

    public function form()
    {
        $id = $this->params['id'];

        $ordersTable = new OrdersTable();
        $order = $ordersTable->get("*", ['id' => $id]);

        if (!empty($order)) {
            $order = $order[0];
        }
        else {
            $order = null;
        }

        $statusTable = new OrderStatusTable();
        $statuses = $statusTable->get("*");

        new View("admin/orders/form", $this->page, ['data' => $order, 'statuses' => $statuses]);
    }

    public function add() {}

    public function edit()
    {
        $post = $this->page->getPost();

        // var_dump($post);

        $id = $post['id'];
        $name = $post['name'];
        $email = $post['email'];
        $phone = $post['phone'];
        $status_id = $post['status_id'];

        $ordersTable = new OrdersTable();
        if ($insert = $ordersTable->update(['name' => $name, 'email' => $email, 'phone' => $phone, 'status_id' => $status_id], ['id' => $id])) {
            header("Location: /profile/admin/orders/");
        }
        else {
            new View("admin/orders/order_error", $this->page);
        }
    }

    public function delete()
    {
        $post = $this->page->getPost();
        $id = $post['id'];

        $orderProductsTable = new OrderProductsTable();
        if ($orderProductsTable->delete(['order_id' => $id])) {
            $ordersTable = new OrdersTable();
            if ($ordersTable->delete(['id' => $id])) {
                header("Location: /profile/admin/orders/");
            }
            else {
                new View("admin/orders/order_error", $this->page);
            }
        }
        else {
            new View("admin/orders/order_error", $this->page);
        }
    }
}