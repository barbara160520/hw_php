<?php
namespace app\models\entities;

use app\engine\Db;
use app\models\Entity;

class Orders extends Entity
{
    protected $id;
    protected $name;
    protected $phone;
    protected $session_id;
    protected $user_id;

    protected $props = [
        'name' => false,
        'phone' => false,
        'session_id' => false,
        'user_id' => false
    ];

    public function __construct($name = null, $phone = null,$session_id=null,$user_id=null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->session_id = $session_id;
        $this->user_id = $user_id;
    }

}