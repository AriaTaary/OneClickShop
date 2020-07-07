<?php


namespace app\controllers;


use app\base\BaseController;
use base\View\View;

class OrderController extends BaseController
{
    public function basket()
    {
        new View("site/basket", $this->page);
    }

    public function order()
    {
        new View("site/order", $this->page);
    }
}