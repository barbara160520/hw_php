<?php
namespace app\models;


class Products extends DBModel
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;


    protected $props = [
        'name' => false,
        'description' => false,
        'price' => false,
    ];


    protected function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }


    protected static function getTableName()
    {
        return 'goods';
    }
}