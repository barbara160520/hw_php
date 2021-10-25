<?php
namespace app\models;

class Reviews extends Model
{
    public $id;
    public $name;
    public $comment;
    public $id_product;

    public function __construct($name = null,$comment=null, $id_product = null)
    {
        $this->name = $name;
        $this->comment = $comment;
        $this->id_product = $id_product;
    }

    public static function getTableName()
    {
        return 'reviews';
    }
}