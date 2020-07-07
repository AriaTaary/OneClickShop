<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\CategoriesTable;
use app\model\Category;

class CategoriesComponent extends BaseComponent
{
    /** @var CategoriesTable */
    private $table;

    public function getAll()
    {
        $this->setTable();

        return $this->table->get("*");
    }

    public function getById($id)
    {
        $this->setTable();

        if ($category = $this->table->get("*", ['id' => $id])) {
            return $category[0];
        }
        else {
            return null;
        }
    }

    public function add($name, $link, $image)
    {
        $this->setTable();

        $this->table->beginTransaction();
        $upload = FilesComponent::uploadImage($image);

        if ($upload['status']) {

            $image = $upload['filename'];
            $category = new Category($name, $link, $image);

            if ($this->table->insert($category)) {
                $this->table->commit();
                return true;
            }
            else {
                $this->table->rollBack();
                return "Ошибка при добавлении категории!";
            }
        }
        else {
            $this->table->rollBack();
            return $upload['error'];
        }
    }

    public function edit($id, $name, $link, $image = null)
    {
        $this->setTable();

        $this->table->beginTransaction();

        if ($image) {
            if (($current = $this->table->get(['image'], ['id' => $id])) && !empty($current)) {

                $oldImage = $current[0]['image'];
                if (FilesComponent::deleteFile($oldImage)) {
                    return $this->uploadAndUpdate($id, $name, $link, $image);
                }
                else {
                    $this->table->rollBack();
                    return "Ошибка при удалении старой картинки!";
                }
            }
            else {
                return $this->uploadAndUpdate($id, $name, $link, $image);
            }
        }
        else {
            if ($this->table->update(['name' => $name, 'link' => $link], ['id' => $id])) {
                $this->table->commit();
                return true;
            }
            else {
                $this->table->rollBack();
                return "Ошибка при изменении категории";
            }
        }
    }

    public function delete($id)
    {
        $this->setTable();

        $this->table->beginTransaction();

        $image = $this->table->get(['image'], ['id' => $id]);
        if (is_array($image) && !empty($image)) {

            $filename = $image[0]['image'];
            if (unlink(HOME . "uploads/" . $filename)) {
                if ($this->table->delete(['id' => $id])) {
                    $this->table->commit();
                    return true;
                }
                else {
                    $this->table->rollBack();
                    return false;
                }
            }
            else {
                $this->table->rollBack();
                return false;
            }
        }
        else {
            $this->table->commit();
            return true;
        }
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

    protected function setTable()
    {
        if (is_null($this->table)) {
            $this->table = new CategoriesTable();
        }
    }
}