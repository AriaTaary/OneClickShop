<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\ProductsComponent;
use base\Page;

class CatalogueController extends BaseController
{
    /** @var ProductsComponent */
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->setComponent();
    }

    public function category()
    {
        $category = $this->params['category'];
    }

    public function item()
    {
        $article = $this->params['article'];
    }

    private function setComponent()
    {
        $this->component = new ProductsComponent();
    }
}