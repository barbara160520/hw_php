<?php
namespace app\models\entities;
use app\models\Entity;

class Reviews extends Entity
{
    protected $id;
    protected $name;
    protected $comment;
    protected $id_product;

    protected $props = [
        'name' => false,
        'comment' => false,
        'id_product' => false
    ];

    public function __construct($name = null,$comment=null, $id_product = null)
    {
        $this->name = $name;
        $this->comment = $comment;
        $this->id_product = $id_product;
    }

}