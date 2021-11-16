<?php

namespace app\models\repositories;

use app\engine\Db;
use app\models\entities\Orders;
use app\models\Repository;

class OrdersRepository extends Repository
{
    public function getSumm($id){
        $sql = "SELECT SUM(g.price) as summ FROM orders o JOIN basket b ON b.users_id = o.user_id AND b.session_id = o.session_id JOIN goods g ON g.id = b.product_id WHERE o.id = :id";
        return Db::getInstance()->queryAll($sql, ['id' => $id]);
    }

    public function getAllBasket($id){
        $sql = "SELECT g.name,g.price,g.image FROM orders o JOIN basket b ON b.users_id = o.user_id AND b.session_id = o.session_id JOIN goods g ON g.id = b.product_id WHERE o.id = :id";
    
        return Db::getInstance()->queryAll($sql, ['id' => $id]);
    }

    protected function getEntityClass() {
        return Orders::class;
    }

    protected function getTableName()
    {
        return 'orders';
    }
}