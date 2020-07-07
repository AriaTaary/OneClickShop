<?php

namespace app\controllers;

use app\base\BaseController;
use app\components\CategoriesComponent;
use app\components\ProductsComponent;
use base\Page;
use base\View\View;

class SiteController extends BaseController
{

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);
    }

    public function index()
    {
        $productsComponent = new ProductsComponent();
        $products = $productsComponent->getNewProducts(15);

        $categoriesComponent = new CategoriesComponent();
        $categories = $categoriesComponent->getAll();

        new View("site/index", $this->page, ['products' => $products,'categories' => $categories]);
    }

    public function delivery()
    {
        new View("site/delivery", $this->page);
    }

    public function contacts()
    {
        new View("site/contacts", $this->page);
    }
}