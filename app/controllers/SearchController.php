<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\ProductsComponent;
use base\View\View;

class SearchController extends BaseController
{
    public function search()
    {
        $get = $this->page->getGet();
        $search = $get['s'];

        $component = new ProductsComponent();
        $products = $component->search($search);

        new View("site/search", $this->page, ['products' => $products]);
    }
}