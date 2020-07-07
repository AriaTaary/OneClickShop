<?php


namespace app\model;


use base\model\Model;

class Product extends Model
{
    public $id;
    public $category_id;
    public $brand_id;
    public $article;
    public $name;
    public $description;
    public $price;

    /**
     * Product constructor.
     * @param $category_id
     * @param $brand_id
     * @param $article
     * @param $name
     * @param $description
     * @param $price
     */
    public function __construct($category_id, $brand_id, $article, $name, $description, $price)
    {
        $this->category_id = $category_id;
        $this->brand_id = $brand_id;
        $this->article = $article;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;

        $this->auto_increment = ['id'];
    }


}