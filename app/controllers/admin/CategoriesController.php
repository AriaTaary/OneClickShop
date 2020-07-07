<?php


namespace app\controllers\admin;


use app\base\AdminController;
use app\components\CategoriesComponent;
use base\Page;
use base\View\View;

class CategoriesController extends AdminController
{
    /** @var CategoriesComponent */
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->setComponent();
    }

    public function all()
    {
        $data = $this->component->getAll();

        new View("admin/categories/all", $this->page, ['data' => $data]);
    }

    public function form()
    {
        if (!empty($this->params)) {
            $id = $this->params['id'];

            $data = $this->component->getById($id);

            if (!empty($data)) {
                new View("admin/categories/form", $this->page, ['data' => $data, 'edit' => true]);
            }
            else {
                new View("errors/no_edit", $this->page);
            }
        }
        else {
            new View("admin/categories/form",$this->page);
        }
    }

    public function add()
    {
        $post = $this->page->getPost();
        $files = $this->page->getFiles();

        $name = $post['name'];
        $link = $post['link'];
        $image = $files['image'];

        $add = $this->component->add($name, $link, $image);

        if ($add === true) {
            header("Location: /admin/categories/");
        }
        else {
            new View("admin/categories/form", $this->page, ['data' => $post, 'error' => $add]);
        }
    }

    public function edit()
    {
        $post = $this->page->getPost();
        $files = $this->page->getFiles();

        $id = $post['id'];
        $name = $post['name'];
        $link = $post['link'];

        if (!empty($files) && $files['image']['error'] !== 4) {
            $image = $files['image'];
        }
        else {
            $image = null;
        }

        $edit = $this->component->edit($id, $name, $link, $image);

        if ($edit === true) {
            header("Location: /admin/categories/");
        }
        else {
            new View("site/categories/form", $this->page, ['data' => $post, 'error' => $edit, 'edit' => true]);
        }
    }

    public function delete()
    {
        $post = $this->page->getPost();
        $id = $post['id'];

        $delete = $this->component->delete($id);

        if ($delete) {
            header("Location: /admin/categories/");
        }
        else {
            new View("errors/delete", $this->page);
        }
    }

    private function setComponent()
    {
        if (is_null($this->component)) {
            $this->component = new CategoriesComponent();
        }
    }
}