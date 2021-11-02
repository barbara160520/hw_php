<?php
namespace app\models;


class Products extends DBModel
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $image;
    protected $likes;

    protected $props = [
        'name' => false,
        'description' => false,
        'price' => false,
        'image' => false,
        'likes' => false
    ];


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