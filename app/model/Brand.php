<?php


namespace app\model;


use base\model\Model;

class Brand extends Model
{
    public $id;
    public $name;
    public $link;

    /**
     * Brand constructor.
     * @param $name
     * @param $link
     */
    public function __construct($name, $link)
    {
        $this->name = $name;
        $this->link = $link;

        $this->auto_increment = ['id'];
    }
}