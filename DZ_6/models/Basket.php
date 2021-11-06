<?php

namespace app\models;

use app\engine\Db;

class Basket extends DBModel
{
    protected $id;
    protected $session_id;
    protected $product_id;
    protected $users_id;

    protected $props = [
        'session_id' => false,
        'product_id' => false,
        'users_id' => false
    ];

    public function __construct($session_id = null, $product_id = null, $users_id=null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->users_id = $users_id;
    }

    public static function getBasket($session_id) {
        $sql = "SELECT basket.id basket_id, goods.id prod_id, goods.name, goods.description,goods.image, goods.price FROM `basket`,`goods` WHERE `session_id` = :session_id AND basket.product_id = goods.id";

        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    public static function getAllBasket($id){
        $sql = "SELECT g.name,g.price,g.image FROM orders o JOIN basket b ON b.users_id = o.user_id AND b.session_id = o.session_id JOIN goods g ON g.id = b.product_id WHERE o.id = :id";
    
        return Db::getInstance()->queryAll($sql, ['id' => $id]);
    }

    public static function getSumm($session_id){
        $sql = "SELECT SUM(goods.price) as summ FROM basket, goods WHERE basket.product_id=goods.id AND session_id = :session_id";
        return Db::getInstance()->queryAll($sql, ['session_id' => $session_id]);
    }

    protected static function getTableName()
    {
        return 'basket';
    }
}