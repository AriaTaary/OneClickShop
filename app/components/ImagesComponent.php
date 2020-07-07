<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\ImagesTable;
use app\model\Image;

class ImagesComponent extends BaseComponent
{
    /** @var ImagesTable */
    private $table;

    public function getByProductId($product_id)
    {
        $this->setTable();

        return $this->table->get("*", ['product_id' => $product_id]);
    }

    public function getOneImage($product_id)
    {
        $this->setTable();

        return $this->table->get("*", ['product_id' => $product_id], null, 1);
    }

    public function add($filename, $product_id)
    {
        $this->setTable();

        $image = new Image($filename, $product_id);

        return $this->table->insert($image);
    }

    public function delete($id)
    {
        $this->setTable();

        return $this->table->delete(['id' => $id]);
    }

    public function deleteByName($name)
    {
        $this->setTable();

        return $this->table->delete(['name' => $name]);
    }

    protected function setTable()
    {
        if (is_null($this->table)) {
            $this->table = new ImagesTable();
        }
    }
}