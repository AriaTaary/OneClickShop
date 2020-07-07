<?php


namespace app\database;


use base\database\Table;

class UserStatusTable extends Table
{
    public function __construct($dbname = "default")
    {
        parent::__construct($dbname);

        $this->tableName = "user_status";
    }
}