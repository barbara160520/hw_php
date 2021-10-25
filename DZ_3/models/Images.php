<?php
namespace app\models;

class Images extends Model
{
    public $id;
    public $name;
    public $likes;

    public function __construct($name = null, $likes = 0)
    {
        $this->name = $name;
        $this->likes = $likes;
    }

    public static function getTableName()
    {
        return 'images';
    }
}