<?php


namespace app\controllers\admin;


use app\base\AdminController;
use base\View\View;

class ProductsController extends AdminController
{

    public function all()
    {
        new View("admin/products/all", $this->page);
    }

    public function form()
    {
        // TODO: Implement form() method.
    }

    public function add()
    {
        // TODO: Implement add() method.
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}