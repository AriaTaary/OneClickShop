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
}