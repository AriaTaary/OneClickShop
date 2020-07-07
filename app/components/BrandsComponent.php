<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\BrandsTable;
use app\model\Brand;

class BrandsComponent extends BaseComponent
{
    /** @var BrandsTable */
    private $table;

    public function getAll()
    {
        $this->setTable();

        if ($brands = $this->table->get("*")) {
            return $brands;
        }
        else {
            return null;
        }
    }

    public function getById($id)
    {
        $this->setTable();

        if ($brands = $this->table->get("*", ['id' => $id])) {

            $brand = $brands[0];
            $brand['link'] = str_replace("_", " ", $brand['link']);

            return $brand;
        }
        else {
            return null;
        }
    }

    public function add($name, $link)
    {
        $this->setTable();

        $link = str_replace(" ", "_", $link);
        $link = strtolower($link);
        $this->table->beginTransaction();

        $brand = new Brand($name, $link);

        if (!is_array($insert = $this->table->insert($brand))) {
            $this->table->commit();
            return true;
        }
        else {
            $this->table->rollBack();
            return $insert[0] . " " . $insert[2];
        }
    }

    public function edit($id, $name, $link)
    {
        $this->setTable();

        $brand = $this->table->get("*", ['id' => $id]);

        if (!empty($brand)) {

            $link = str_replace(" ", "_", $link);
            $link = strtolower($link);
            $this->table->beginTransaction();

            if ($this->table->update(['name' => $name, 'link' => $link], ['id' => $id])) {
                $this->table->commit();
                return true;
            }
            else {
                $this->table->rollBack();
                return "Ошибка при обновлении бренда";
            }
        }
        else {
            return "Бренда с таким ID не существует";
        }
    }

    public function delete($id)
    {
        $this->setTable();

        $brand = $this->table->get("*", ['id' => $id]);

        if (!empty($brand)) {

            $this->table->beginTransaction();

            if ($this->table->delete(['id' => $id])) {
                $this->table->commit();
                return true;
            } else {
                $this->table->rollBack();
                return "Ошибка при удалении бренда";
            }
        }
        else {
            return "Бренда с таким ID не существует";
        }
    }

    protected function setTable()
    {
        if (is_null($this->table)) {
            $this->table = new BrandsTable();
        }
    }
}