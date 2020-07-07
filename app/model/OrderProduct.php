<?php


namespace app\model;


use base\model\Model;

class OrderProduct extends Model
{
    public $order_id;
    public $product_id;
    public $count;

    /**
     * OrderProduct constructor.
     * @param $order_id
     * @param $product_id
     * @param $count
     */
    public function __construct($order_id, $product_id, $count)
    {
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->count = $count;
    }


}