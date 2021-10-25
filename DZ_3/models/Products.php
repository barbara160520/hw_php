<?php
namespace app\models;


class Products extends Model
{
    public $id;
    public $name;
    public $image;
    public $description;
    public $price;
    public $likes;

    public function __construct($name = null,$image=null, $description = null, $price = null, $likes = 0)
    {
        $this->name = $name;
        $this->image=$image;
        $this->description = $description;
        $this->price = $price;
        $this->likes = $likes;
    }

    public static function getTableName()
    {
        return 'goods';
    }
}