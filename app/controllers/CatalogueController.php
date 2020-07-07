<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\CategoriesComponent;
use app\components\ProductsComponent;
use app\database\BrandsTable;
use app\database\ImagesTable;
use base\Page;
use base\View\View;

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

        $categoriesComponent = new CategoriesComponent();
        $category =$categoriesComponent->getByLink($category);

        $products = $this->component->getByCategory($category['id']);

        new View("site/category", $this->page, ['category' => $category, 'products' => $products]);
    }

    public function item()
    {
        $article = $this->params['article'];
        $product = $this->component->getByArticle($article);

        $brandsTable = new BrandsTable();
        $brands = $brandsTable->get("*", ['id' => $product['brand_id']]);
        $product['brand'] = $brands[0]['name'];

        $imagesTable = new ImagesTable();
        $images = $imagesTable->get("*", ['product_id' => $product['id']]);

        new View("site/product", $this->page, ['product' => $product, 'images' => $images]);
    }

    private function setComponent()
    {
        $this->component = new ProductsComponent();
    }
}