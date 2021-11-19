<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Basket;
use app\models\Repository;

class BasketRepository extends Repository
{
    public function getBasket($session_id) {
        $sql = "SELECT basket.id basket_id, goods.id prod_id, goods.name, goods.description,goods.image, goods.price FROM `basket`,`goods` WHERE `session_id` = :session_id AND basket.product_id = goods.id";

        return App::call()->db->queryAll($sql, ['session_id' => $session_id]);
    }

    public function getSumm($session_id){
        $sql = "SELECT SUM(goods.price) as summ FROM basket, goods WHERE basket.product_id=goods.id AND session_id = :session_id";
        return App::call()->db->queryAll($sql, ['session_id' => $session_id]);
    }

    public function getBasketId($session_id){
        $sql = "SELECT id  FROM `basket` WHERE `session_id` = :session_id";

        return App::call()->db->queryOne($sql, ['session_id' => $session_id]);
    }

    public function upBasket($id,$user_id){
        $sql = "UPDATE `basket` SET `user_id`=':user_id' WHERE id = :id";
        //не обновляется в самой БД
        return App::call()->db->execute($sql,['id' => $id, 'user_id' => $user_id]);
    }

    protected function getEntityClass() {
        return Basket::class;
    }

    protected function getTableName()
    {
        return 'basket';
    }
}