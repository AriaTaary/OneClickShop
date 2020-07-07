<?php


namespace app\controllers\admin;


use app\base\AdminController;
use app\components\FilesComponent;
use app\database\SponsorsTable;
use app\model\Sponsor;
use base\Page;
use base\View\View;

class SponsorsController extends AdminController
{
    private $table;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->table = new SponsorsTable();
    }

    public function all()
    {
        $sponsors = $this->table->get("*");

        new View("admin/sponsors/all", $this->page, ['data' => $sponsors]);
    }

    public function form()
    {
        if (!empty($this->params)) {
            $id = $this->params['id'];

            $data = $this->table->get("*", ['id' => $id]);
            if (!empty($data)) {
                $data = $data[0];
            }
            else {
                $data = null;
            }

            if (!empty($data)) {
                new View("admin/sponsors/form", $this->page, ['data' => $data, 'edit' => true]);
            }
            else {
                new View("errors/no_edit", $this->page);
            }
        }
        else {
            new View("admin/sponsors/form", $this->page);
        }
    }

    public function add()
    {
        $post = $this->page->getPost();
        $files = $this->page->getFiles();

        $name = $post['name'];
        $link = $post['link'];
        $image = $files['image'];

        $this->table->beginTransaction();
        $upload = FilesComponent::uploadImage($image);

        if ($upload['status']) {
            $image = $upload['filename'];
            $sponsor = new Sponsor($name, $link, $image);

            if (!is_array($insert = $this->table->insert($sponsor))) {
                $this->table->commit();
                header("Location: /profile/admin/sponsors/");
            }
            else {
                $this->table->rollBack();
                new View("admin/sponsors/form", $this->page, ['data' => $post, 'error' => $insert[2]]);
            }
        }
        else {
            $this->table->rollBack();
            new View("admin/sponsors/form", $this->page, ['data' => $post, 'error' => $upload['error']]);
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

        $this->table->beginTransaction();

        if ($image) {
            if (($current = $this->table->get(['image'], ['id' => $id])) && !empty($current)) {

                $oldImage = $current[0]['image'];
                if (FilesComponent::deleteFile($oldImage)) {
                    if (($update = $this->uploadAndUpdate($id, $name, $link, $image)) === true) {
                        header("Location: /profile/admin/sponsors/");
                    }
                    else {
                        new View("admin/sponsors/form", $this->page, ['data' => $post, 'edit' => true, 'error' => $update]);
                    }
                }
                else {
                    $this->table->rollBack();
                    new View("admin/sponsors/form", $this->page, ['data' => $post, 'edit' => true, 'error' => "Ошибка при удалении старой картинки!"]);
                }
            }
            else {
                if (($update = $this->uploadAndUpdate($id, $name, $link, $image)) === true) {
                    header("Location: /profile/admin/sponsors/");
                }
                else {
                    new View("admin/sponsors/form", $this->page, ['data' => $post, 'edit' => true, 'error' => $update]);
                }
            }
        }
        else {
            if ($this->table->update(['name' => $name, 'link' => $link], ['id' => $id])) {
                $this->table->commit();
                header("Location: /profile/admin/sponsors/");
            }
            else {
                $this->table->rollBack();
                new View("admin/sponsors/form", $this->page, ['data' => $post, 'edit' => true, 'error' => "Ошибка при изменении категории"]);
            }
        }
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    private function uploadAndUpdate($id, $name, $link, $image)
    {
        $upload = FilesComponent::uploadImage($image);

        if ($upload['status']) {

            $image = $upload['filename'];

            if ($this->table->update(['name' => $name, 'link' => $link, 'image' => $image], ['id' => $id])) {
                $this->table->commit();
                return true;
            }
            else {
                $this->table->rollBack();
                return "Ошибка при изменении категории";
            }
        }
        else {
            $this->table->rollBack();
            return $upload['error'];
        }
    }
}