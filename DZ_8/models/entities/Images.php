<?php
namespace app\models\entities;
use app\models\Entity;

class Images extends Entity
{
    protected $id;
    protected $name;
    protected $likes;

    protected $props = [
        'name' => false,
        'likes' => false
    ];

    public function __construct($name = null, $likes = 0)
    {
        $this->name = $name;
        $this->likes = $likes;
    }

}