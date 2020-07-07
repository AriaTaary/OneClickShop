<?php


namespace app\database;


use base\database\Table;

class ProductsTable extends Table
{
    public function __construct()
    {
        parent::__construct();

        $this->tableName = "products";
    }

    public function search($search)
    {
        $sql =
            "select * from {$this->tableName} where name like '%{$search}%' or description like '%{$search}%' or article like '%{$search}%'";

        return $this->getQueryArray($sql);
    }

    public function filter($brands, $min, $max, $category_id)
    {
        $sql =
            "select * from {$this->tableName}
            where category_id = {$category_id}";

        if ($brands) {
            $sql .= " and (";
            foreach ($brands as $key => $item) {
                if ($key === 0) {
                    $sql .= "brand_id = {$item} ";
                }
                else {
                    $sql .= "or brand_id = {$item} ";
                }
            }
            $sql .= ") ";
        }

        if ($min) {
            $sql .= " and price > {$min}";
        }

        if ($max) {
            $sql .= " and price < {$max}";
        }

        return $this->getQueryArray($sql);
    }
}