<?php

namespace app\models;

use app\engine\Db;

abstract class DBModel extends Model
{
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
        $params = [];
        $columns =[];

        foreach ($this as $key => $value) {
            //if ($key == 'id') continue;
            $params[":{$key}"] = $value;
            $columns[] = $key .  " = " . ":{$key}";
        }
        //строка для переменных и значений
        $columns = implode(", ",$columns);

        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET  {$columns}  WHERE id = :id";

        //var_dump($columns,$sql,$params);

        return DB::getInstance()->execute($sql, $params);
    }

    public function save() {
        //var_dump($this);
        //TODO вызвать либо insert либо update
        if(is_null($this->id)){
            return $this->insert();
        } else {
            return $this->update();
        }
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
    
    public static function getLimit($limit) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0, ?";
        return Db::getInstance()->queryLimit($sql, $limit);
    }
}