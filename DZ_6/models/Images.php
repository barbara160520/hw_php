<?php
namespace app\models;
use app\engine\Db;

class Images extends DBModel
{
    protected $id;
    protected $name;
    protected $likes;

    protected $props = [
        'name' => false,
        'likes' => false
    ];

    protected function __construct($name = null, $likes = 0)
    {
        $this->name = $name;
        $this->likes = $likes;
    }

    public static function getImages(){
        $sql = "SELECT * FROM images order by likes DESC";
        return Db::getInstance()->queryAll($sql);
    }
    protected static function getTableName()
    {
        return 'images';
    }
}