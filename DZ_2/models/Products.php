<?php
namespace app\models;


class Products extends Model
{
    public $id;
    public $name;
    public $image;
    public $description;
    public $price;
    public $like;


    public function getTableName()
    {
        return 'products';
    }
}