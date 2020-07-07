<?php


namespace app\model;


use base\model\Model;

class User extends Model
{
    public $id;
    public $email;
    public $password;
    public $salt;

    /**
     * User constructor.
     * @param $email
     * @param $password
     * @param $salt
     */
    public function __construct($email, $password, $salt)
    {
        $this->email = $email;
        $this->password = $password;
        $this->salt = $salt;

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