<?php


namespace app\model;


use base\model\Model;

class Order extends Model
{
    public $id;
    public $date;
    public $user_id;
    public $address;
    public $sum;
    public $status_id;
    public $name;
    public $email;
    public $phone;

    /**
     * Order constructor.
     * @param $date
     * @param $user_id
     * @param $address
     * @param $sum
     * @param $status_id
     * @param $name
     * @param $email
     * @param $phone
     */
    public function __construct($date, $user_id, $address, $sum, $status_id, $name, $email, $phone)
    {
        $this->date = $date;
        $this->user_id = $user_id;
        $this->address = $address;
        $this->sum = $sum;
        $this->status_id = $status_id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;

        $this->auto_increment = ['id'];
    }
}