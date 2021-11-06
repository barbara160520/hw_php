<?php
namespace app\models;
use app\engine\Db;

class Orders extends DBModel
{
    protected $id;
    protected $name;
    protected $phone;
    protected $session_id;
    protected $user_id;

    protected $props = [
        'name' => false,
        'phone' => false,
        'session_id' => false,
        'user_id' => false
    ];

    protected function __construct($name = null, $phone = null,$session_id=null,$user_id=null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->session_id = $session_id;
        $this->user_id = $user_id;
    }

    public static function getSumm($id){
        $sql = "SELECT SUM(g.price) as summ FROM orders o JOIN basket b ON b.users_id = o.user_id AND b.session_id = o.session_id JOIN goods g ON g.id = b.product_id WHERE o.id = :id";
        return Db::getInstance()->queryAll($sql, ['id' => $id]);
    }

    protected static function getTableName()
    {
        return 'orders';
    }
}