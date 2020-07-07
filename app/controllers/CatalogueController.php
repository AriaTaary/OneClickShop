<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\BrandsComponent;
use app\components\CategoriesComponent;
use app\components\ProductsComponent;
use app\database\BrandsTable;
use app\database\FavouriteProductsTable;
use app\database\ImagesTable;
use app\model\FavouriteProduct;
use base\App;
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
        $category = $categoriesComponent->getByLink($category);

        $sort = null;
        $products = null;

        if (!empty($get = $this->page->getGet())) {
            $sort = isset($get['sort']) ? $get['sort'] : null;

            $brandsFilter = (!empty($get['brands'])) ? $get['brands'] : null;
            $min = (isset($get['price_min']) && $get['price_min'] !== "") ? $get['price_min'] : null;
            $max = (isset($get['price_min']) && $get['price_max'] !== "") ? $get['price_max'] : null;

            if ($sort) {
                $products = $this->component->getByCategorySorted($category['id'], $sort);
            }

            if ($brandsFilter || $min || $max) {
                $products = $this->component->getByFilter($brandsFilter, $min, $max, $category['id']);
            }
        }
        else {
            $products = $this->component->getByCategory($category['id']);
        }

        $brandsComponent = new BrandsComponent();
        $brands = $brandsComponent->getAll();

        new View("site/category", $this->page, ['category' => $category, 'products' => $products, 'sort' => $sort, 'brands' => $brands]);
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

        if (App::$session->user->isAuth()) {
            $favouriteTable = new FavouriteProductsTable();
            if (!empty($favouriteTable->get("*", ['user_id' => App::$session->user->getId(), 'product_id' => $product['id']]))) {
                $favourite = true;
            }
            else {
                $favourite = false;
            }
        }
        else {
            $favourite = null;
        }

        new View("site/product", $this->page, ['product' => $product, 'images' => $images, 'favourite' => $favourite]);
    }

    public function favourite()
    {
        $post = $this->page->getPost();

        $user_id = $post['user_id'];
        $product_id = $post['product_id'];

        $table = new FavouriteProductsTable();
        $row = $table->get("*", ['user_id' => $user_id, 'product_id' => $product_id]);

        if (empty($row)) {
            $favouriteProduct = new FavouriteProduct($user_id, $product_id);
            if (!is_array($table->insert($favouriteProduct))) {
                echo json_encode(['success' => 1]);
            }
            else {
                echo json_encode(['success' => 0]);
            }
        }
        else {
            $table->delete(['user_id' => $user_id, 'product_id' => $product_id]);
            echo json_encode(['success' => 1]);
        }
    }



    private function setComponent()
    {
        $this->component = new ProductsComponent();
    }
}