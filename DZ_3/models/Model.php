<?php
namespace app\models;
use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{
    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    abstract protected static function getTableName();

    public function insert() {
        $params = [];
        $columns =[];

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $params[":{$key}"] = $value;
            $columns[] = $key; 
        }

    //строка для переменных
        $columns = implode(", ",$columns);
    //строка для значений
        $values = implode(", ",array_keys($params)); 

        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";

        var_dump($params,$sql);

        //INSERT INTO users(`login`, `pass`) VALUES (:login, :pass)
        //params= ['login'=>'user', ....

        DB::getInstance()->execute($sql, $params);
        $this->id = DB::getInstance()->lastInsertId();

        return $this;
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return DB::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function update() {
       /* $params = [];
        $columns =[];

        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $params[":{$key}"] = $value;
            $columns[] = $key; 
        }
        //строка для переменных
        $columns = implode(", ",$columns);
        //строка для значений
        $values = implode(", ",array_keys($params)); 

        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET    WHERE id = :id";
        var_dump($params,$sql,$columns,$values);
        
        //return DB::getInstance()->execute($sql, ['id' => $this->id]);*/
    }

    public function save() {
        //TODO вызвать либо insert либо update
    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        //return Db::getInstance()->queryOne($sql, ['id' => $id]);
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], get_called_class());
    }

    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }
}