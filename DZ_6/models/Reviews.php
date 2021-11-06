<?php
namespace app\models;
use app\engine\Db;

class Reviews extends DBModel
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

    protected function __construct($name = null,$comment=null, $id_product = null)
    {
        $this->name = $name;
        $this->comment = $comment;
        $this->id_product = $id_product;
    }

    public static function getRviews(){
        $sql = "SELECT * FROM reviews order by id DESC";
        return Db::getInstance()->queryAll($sql);
    }
    protected static function getTableName()
    {
        return 'reviews';
    }
}