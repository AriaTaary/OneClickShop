<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\ProductsTable;
use base\component\Component;

class ProductsComponent extends BaseComponent
{
    /** @var ProductsTable */
    private $table;

    public function getAll()
    {
        $this->setTable();

        if (!empty($products = $this->table->get("*"))) {

            $categoriesComponent = new CategoriesComponent();
            foreach ($products as $key => $product) {
                $products[$key]['category'] = $categoriesComponent->getById($product['category_id']);
            }

            return $products;
        }
        else {
            return null;
        }
    }

    public function getById($id)
    {
        $this->setTable();

        if (!empty($product = $this->table->get("*", ['id' => $id]))) {
            return $product[0];
        }
        else {
            return null;
        }
    }

    public function add($category_id, $brand_id, $article, $name, $description, $price)
    {
        $this->setTable();
    }

    public function edit()
    {
        $this->setTable();
    }

    public function delete($id)
    {
        $this->setTable();
    }

    protected function setTable()
    {
        if (is_null($this->table)) {
            $this->table = new ProductsTable();
        }
    }
}