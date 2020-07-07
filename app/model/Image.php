<?php


namespace app\model;


use base\model\Model;

class Image extends Model
{
    public $id;
    public $name;
    public $product_id;

    /**
     * Image constructor.
     * @param $name
     * @param $product_id
     */
    public function __construct($name, $product_id)
    {
        $this->name = $name;
        $this->product_id = $product_id;

        $this->auto_increment = ['id'];
    }


}