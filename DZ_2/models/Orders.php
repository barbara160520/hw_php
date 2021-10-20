<?php
namespace app\models;


class Orders extends Model
{
    public $id;
    public $name;
    public $phone;
    public $session_id;
    public $user_id;


    public function getTableName()
    {
        return 'orders';
    }
}