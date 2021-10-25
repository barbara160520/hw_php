<?php

namespace app\models;

class Users extends Model
{
    public $id;
    public $login;
    public $pass;
    public $hash;
    public $role;

    public function __construct($login = null, $pass = null,$hash=null,$role = 0)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
        $this->role = $role;
    }

    public static function getTableName() {
        return 'users';
    }

}