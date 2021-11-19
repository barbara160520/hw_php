<?php

namespace app\models\entities;

use app\models\Entity;


class Users extends Entity
{
    protected $id;
    protected $login;
    protected $pass;
    protected $hash;
    protected $role;

    protected $props = [
        'login' => false,
        'pass' => false,
        'hash' => false,
        'role' => false
    ];

    public function __construct($login = null, $pass = null, $hash = null, $role = 0)
    {
        $this->login = strtolower($login);
        $this->pass = $pass;
        $this->hash = $hash;
        $this->role = $role;
    }

}