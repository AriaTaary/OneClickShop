<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\BrandsTable;
use app\database\CategoriesTable;
use app\database\ProductsTable;
use app\model\Product;
use base\component\Component;

class ProductsComponent extends BaseComponent
{
    /** @var ProductsTable */
    private $table;

    /** @var CategoriesTable */
    private $categoriesTable;

    public function getAll()
    {
        $this->setTable();

        if (!empty($products = $this->table->get("*"))) {

            $categoriesComponent = new CategoriesComponent();
            foreach ($products as $key => $product) {
                $category = $categoriesComponent->getById($product['category_id']);;
                $products[$key]['category'] = $category['name'];
            }

            $brandsComponent = new BrandsComponent();
            foreach ($products as $key => $product) {
                $brand = $brandsComponent->getById($product['brand_id']);;
                $products[$key]['brand'] = $brand['name'];
            }

            return $products;
        }
        else {
            return null;
        }
    }

    public function getNewProducts($num)
    {
        $this->setTable();

        $products = $this->table->get("*", null, ['id desc'], $num);
        $products = $this->setImages($products);

        return $products;
    }

    public function getById($id)
    {
        $this->setTable();

        if (!empty($products = $this->table->get("*", ['id' => $id]))) {
            $products = $this->setImages($products);
            $product = $products[0];
            $product = $this->setCategoryData($product);

            return $product;
        }
        else {
            return null;
        }
    }

    public function getByCategory($category_id)
    {
        $this->setTable();

        if (!empty($products = $this->table->get("*", ['category_id' => $category_id]))) {
            $products = $this->setImages($products);
            return $products;
        }
        else {
            return null;
        }
    }

    public function getByArticle($article)
    {
        $this->setTable();

        if (!empty($products = $this->table->get("*", ['article' => $article]))) {
            $products = $this->setImages($products);
            $product = $products[0];
            $product = $this->setCategoryData($product);

            return $product;
        }
        else {
            return null;
        }
    }

    public function add($category_id, $brand_id, $article, $name, $description, $price, $images)
    {
        $this->setTable();

        $checkCategory = $this->checkCategoryId($category_id);
        $checkBrand = $this->checkBrandId($brand_id);
        if (!empty($checkCategory) && !empty($checkBrand)) {

            $this->table->beginTransaction();
            $product = new Product($category_id, $brand_id, $article, $name, $description, $price);

            if (!is_array($insert = $this->table->insert($product))) {

                $product_id = $this->table->getInsertId();
                $uploadImages = $this->uploadImages($images, $product_id);

                if ($uploadImages === true) {
                    $this->table->commit();
                }
                else {
                    $this->table->rollBack();
                }

                return $uploadImages;
            }
            else {
                $this->table->rollBack();
                return "[" . $insert[0] . "] " . $insert[2];
            }
        }
        else {
            return "Такой категории или бренда не существует!";
        }
    }

    public function edit($id, $category_id, $brand_id, $article, $name, $description, $price, $images = null)
    {
        $this->setTable();

        $this->table->beginTransaction();

        if ($images) {
            $delete = $this->deleteOldImages($id);

            if ($delete === true) {

                $uploadImages =  $this->uploadImages($images, $id);
                if ($uploadImages !== true) {
                    $this->table->rollBack();
                    return $uploadImages;
                }
            }
            else {
                $this->table->rollBack();
                return $delete;
            }
        }

        $product = $this->getById($id);
        if (!$this->checkEdit($product, $id, $category_id, $brand_id, $article, $name, $description, $price)) {
            $checkCategory = $this->checkCategoryId($category_id);
            $checkBrand = $this->checkBrandId($brand_id);
            if (!empty($checkCategory) && !empty($checkBrand)) {

                $update = $this->table->update(['category_id' => $category_id, "brand_id" => $brand_id, "article" => $article, "name" => $name, "description" => $description, "price" => $price], ['id' => $id]);
                if (!is_array($update)) {
                    $this->table->commit();
                    return true;
                }
                else {
                    $this->table->rollBack();
                    return "[" . $update[0] . "] " . $update[2];
                }
            }
            else {
                $this->table->rollBack();
                return "Такой категории или бренда не существует!";
            }
        }
        else {
            $this->table->commit();
            return true;
        }
    }

    public function delete($id)
    {
        $this->setTable();

        $imagesComponent = new ImagesComponent();
        $images = $imagesComponent->getByProductId($id);

        $this->table->beginTransaction();

        foreach ($images as $image) {
            FilesComponent::deleteFile($image['name']);
        }

        foreach ($images as $image) {
            $deleteImage = $imagesComponent->delete($image['id']);

            if (is_array($deleteImage)) {
                $this->table->rollBack();
                return '[' . $deleteImage[0] . '] ' . $deleteImage[2];
            }
        }

        $delete = $this->table->delete(['id' => $id]);

        if (!is_array($delete)) {
            $this->table->commit();
            return true;
        }
        else {
            $this->table->rollBack();
            return '[' . $delete[0] . '] ' . $delete[2];
        }
    }

    protected function setTable()
    {
        if (is_null($this->table)) {
            $this->table = new ProductsTable();
        }
    }

    private function checkCategoryId($category_id)
    {
        $categoriesComponent = new CategoriesComponent();
        return $categoriesComponent->getById($category_id);
    }

    private function checkBrandId($brand_id)
    {
        $brandsComponent = new BrandsComponent();
        return $brandsComponent->getById($brand_id);
    }

    private function uploadImages($images, $product_id)
    {
        $uploads = array();
        foreach ($images as $image) {
            $upload = FilesComponent::uploadImage($image);
            if ($upload['status']) {
                $uploads[] = $upload['filename'];
            }
            else {
                foreach ($uploads as $filename) {
                    FilesComponent::deleteFile($filename);
                }
                return $upload['error'];
            }
        }

        $imagesComponent = new ImagesComponent();
        foreach ($uploads as $filename) {
            if (is_array($add = $imagesComponent->add($filename, $product_id))) {
                return '[' . $add[0] . '] ' . $add[2];
            }
        }

        return true;
    }

    private function deleteOldImages($product_id)
    {
        $component = new ImagesComponent();
        $images = $component->getByProductId($product_id);

        foreach ($images as $image) {
            if (FilesComponent::deleteFile($image['name'])) {
                if (is_array($delete = $component->deleteByName($image['name']))) {
                    return "[" . $delete[0] . "] " . $delete[2];
                }
            }
            else {
                return "Ошибка при удалении старых картинок!";
            }
        }

        return true;
    }

    private function checkEdit($product, $id, $category_id, $brand_id, $article, $name, $description, $price)
    {
        return $product['id'] == $id &&
            $product['category_id'] == $category_id &&
            $product['brand_id'] == $brand_id &&
            $product['article'] == $article &&
            $product['name'] == $name &&
            $product['description'] == $description &&
            $product['price'] == $price;
    }

    private function setImages($products)
    {
        $imagesComponent = new ImagesComponent();
        foreach ($products as $key => $product) {
            $images = $imagesComponent->getOneImage($product['id']);
            if (!empty($images)) {
                $image = $images[0]['name'];
            }
            else {
                $image = "no_image.jpeg";
            }

            $products[$key]['image'] = $image;
        }

        return $products;
    }

    private function setCategoryData($product)
    {
        $this->setCategoriesTable();

        if (!empty($category = $this->categoriesTable->get("*", ['id' => $product['category_id']]))) {
            $category = $category[0];
            $product['category_name'] = $category['name'];
            $product['category_link'] = $category['link'];

            return $product;
        }
        else {
            return $product;
        }
    }

    private function setCategoriesTable()
    {
        if (is_null($this->categoriesTable)) {
            $this->categoriesTable = new CategoriesTable();
        }
    }
}