<?php


namespace app\database;


use base\database\Table;

class CategoriesTable extends Table
{
    public function __construct()
    {
        parent::__construct();

        $this->tableName = "categories";
    }
}