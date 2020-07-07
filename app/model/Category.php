<?php


namespace app\model;


use base\model\Model;

class Category extends Model
{
    public $id;
    public $name;
    public $link;
    public $image;

    /**
     * Category constructor.
     * @param $name
     * @param $link
     * @param $image
     */
    public function __construct($name, $link, $image)
    {
        $this->name = $name;
        $this->link = $link;
        $this->image = $image;

        $this->auto_increment = ['id'];
    }
}