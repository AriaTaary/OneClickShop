<?php


namespace app\controllers\admin;


use app\base\AdminController;
use app\components\BrandsComponent;
use app\components\CategoriesComponent;
use app\components\ProductsComponent;
use base\Page;
use base\View\View;

class ProductsController extends AdminController
{
    /** @var ProductsComponent */
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->setComponent();
    }

    public function all()
    {
        $data = $this->component->getAll();

        new View("admin/products/all", $this->page, ['data' => $data]);
    }

    public function form()
    {
        $categoriesComponent = new CategoriesComponent();
        $categories = $categoriesComponent->getAll();

        $brandsComponent = new BrandsComponent();
        $brands = $brandsComponent->getAll();

        if (!empty($this->params)) {

            $id = $this->params['id'];
            if ($id !== "") {
                $data = $this->component->getById($id);
                new View("admin/products/form", $this->page, ['categories' => $categories, 'brands' => $brands, 'data' => $data, 'edit' => true]);
            }
            else {
                new View("errors/no_edit", $this->page);
            }
        }
        else {
            new View("admin/products/form", $this->page, ['categories' => $categories, 'brands' => $brands]);
        }
    }

    public function add()
    {
        $post = $this->page->getPost();
        $files = $this->page->getFiles();

        $images = $this->groupImages($files);

        $category_id = $post['category_id'];
        $brand_id = $post['brand_id'];
        $article = $post['article'];
        $name = $post['name'];
        $description = $post['description'];
        $price = $post['price'];

        $add = $this->component->add($category_id, $brand_id, $article, $name, $description, $price, $images);

        if ($add === true) {
            header("Location: /profile/admin/products/");
        }
        else {
            $categoriesComponent = new CategoriesComponent();
            $categories = $categoriesComponent->getAll();

            $brandsComponent = new BrandsComponent();
            $brands = $brandsComponent->getAll();

            new View("admin/products/form", $this->page, ['data' => $post, 'error' => $add, 'categories' => $categories, 'brands' => $brands]);
        }
    }

    public function edit()
    {
        $post = $this->page->getPost();
        $files = $this->page->getFiles();

        if (!empty($files) && $files['images']['error'][0] !== 4) {
            $images = $this->groupImages($files);
        }
        else {
            $images = null;
        }

        $id = $post['id'];
        $category_id = $post['category_id'];
        $brand_id = $post['brand_id'];
        $article = $post['article'];
        $name = $post['name'];
        $description = $post['description'];
        $price = $post['price'];

        $edit = $this->component->edit($id, $category_id, $brand_id, $article, $name, $description, $price, $images);

        if ($edit === true) {
            header("Location: /profile/admin/products/");
        }
        else {
            $categoriesComponent = new CategoriesComponent();
            $categories = $categoriesComponent->getAll();

            $brandsComponent = new BrandsComponent();
            $brands = $brandsComponent->getAll();

            new View("admin/products/form", $this->page, ['categories' => $categories, 'brands' => $brands, 'data' => $post, 'error' => $edit, 'edit' => true]);
        }
    }

    public function delete()
    {
        $post = $this->page->getPost();

        $id = $post['id'];
        $delete = $this->component->delete($id);

        if ($delete === true) {
            header("Location: /profile/admin/products/");
        }
        else {
            new View("errors/delete", $this->page);
        }
    }

    private function setComponent()
    {
        $this->component = new ProductsComponent();
    }

    private function groupImages($files)
    {
        $imageFiles = $files['images'];
        $images = array();
        foreach ($imageFiles['name'] as $key => $filename) {
            $images[$key]['name'] = $filename;
        }
        foreach ($imageFiles['type'] as $key => $type) {
            $images[$key]['type'] = $type;
        }
        foreach ($imageFiles['tmp_name'] as $key => $tmp_name) {
            $images[$key]['tmp_name'] = $tmp_name;
        }
        foreach ($imageFiles['error'] as $key => $error) {
            $images[$key]['error'] = $error;
        }
        foreach ($imageFiles['size'] as $key => $size) {
            $images[$key]['size'] = $size;
        }

        return $images;
    }
}