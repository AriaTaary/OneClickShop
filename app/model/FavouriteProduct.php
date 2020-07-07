<?php


namespace app\model;


use base\model\Model;

class FavouriteProduct extends Model
{
    public $user_id;
    public $product_id;

    /**
     * FavouriteProduct constructor.
     * @param $user_id
     * @param $product_id
     */
    public function __construct($user_id, $product_id)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
    }


}