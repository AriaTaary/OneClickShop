<?php


namespace app\model;


use base\model\Model;

class User extends Model
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $salt;
    public $status_id;

    /**
     * User constructor.
     * @param $name
     * @param $email
     * @param $password
     * @param $salt
     * @param $status_id
     */
    public function __construct($name, $email, $password, $salt, $status_id)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->salt = $salt;
        $this->status_id = $status_id;

        $this->auto_increment = ['id'];
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}