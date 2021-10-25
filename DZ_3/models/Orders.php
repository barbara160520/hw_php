<?php
namespace app\models;


class Orders extends Model
{
    public $id;
    public $name;
    public $phone;
    public $session_id;
    public $user_id;

    public function __construct($name = null, $phone = null,$session_id=null,$user_id=null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->session_id=$session_id;
        $this->user_id=$user_id;
    }

    public static function getTableName()
    {
        return 'orders';
    }
}