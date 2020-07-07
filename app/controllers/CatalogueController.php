<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\CatalogueComponent;
use base\Page;

class CatalogueController extends BaseController
{
    /** @var CatalogueComponent */
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->setComponent();
    }

    public function category()
    {

    }

    public function item()
    {

    }

    private function setComponent()
    {
        $this->component = new CatalogueComponent();
    }
}