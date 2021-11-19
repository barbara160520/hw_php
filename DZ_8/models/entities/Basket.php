<?php

namespace app\models\entities;
use app\models\Entity;

class Basket extends Entity
{
    protected $id;
    protected $session_id;
    protected $product_id;
    protected $user_id;

    protected $props = [
        'session_id' => false,
        'product_id' => false,
        'user_id' => false
    ];

    public function __construct($session_id = null, $product_id = null, $user_id = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->user_id = $user_id;
    }

}