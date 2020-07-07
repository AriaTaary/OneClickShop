<?php


namespace app\database;


use base\database\Table;

class ImagesTable extends Table
{
    public function __construct($dbname = "default")
    {
        parent::__construct($dbname);

        $this->tableName = "images";
    }
}