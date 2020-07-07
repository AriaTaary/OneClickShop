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
}