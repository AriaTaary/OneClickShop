<?php


namespace app\controllers\admin;


use app\base\BaseController;
use app\components\BrandsComponent;
use base\Page;
use base\View\View;

class BrandsController extends BaseController
{
    /** @var BrandsComponent */
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->setComponent();
    }

    public function all()
    {
        $data = $this->component->getAll();

        new View("admin/brands/all", $this->page, ['data' => $data]);
    }

    public function form()
    {
        if (!empty($this->params)) {
            $id = $this->params['id'];

            $data = $this->component->getById($id);

            if (!empty($data)) {
                new View("admin/brands/form", $this->page, ['data' => $data, 'edit' => true]);
            }
            else {
                new View("errors/no_edit", $this->page);
            }
        }
        else {
            new View("admin/brands/form", $this->page);
        }
    }

    public function add()
    {
        $post = $this->page->getPost();

        $name = $post['name'];
        $link = $post['link'];

        $add = $this->component->add($name, $link);

        if ($add === true) {
            header("Location: /admin/brands/");
        }
        else {
            new View("admin/brands/form", $this->page, ['data' => $post, 'error' => $add]);
        }
    }

    public function edit()
    {
        $post = $this->page->getPost();

        $id = $post['id'];
        $name = $post['name'];
        $link = $post['link'];

        $edit = $this->component->edit($id, $name, $link);

        if ($edit === true) {
            header("Location: /admin/brands/");
        }
        else {
            new View("admin/brands/form", $this->page, ['data' => $post, 'error' => $edit, 'edit' => true]);
        }
    }

    public function delete()
    {
        $post = $this->page->getPost();

        $id = $post['id'];
        $delete = $this->component->delete($id);

        if ($delete === true) {
            header("Location: /admin/brands/");
        }
        else {
            new View("errors/delete", $this->page);
        }
    }

    private function setComponent()
    {
        if (is_null($this->component)) {
            $this->component = new BrandsComponent();
        }
    }
}