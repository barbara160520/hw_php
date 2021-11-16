<?php

namespace app\models\repositories;

use app\engine\Db;
use app\models\entities\Users;
use app\models\Repository;

class UserRepository extends Repository
{
    public function auth($login, $pass) {

        $user = $this->getOneWhere('login', $login); //что написать здесь?? вопрос  в чат

        if ($user != false && password_verify($pass, $user->hash)) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public function toggleAdmin($id)
    {
        $role = Db::getInstance()->queryOne("SELECT `role` FROM `users` WHERE `id`=':id'",['id' => $id]);
        $role = (int)!$role;       

        $sql = "UPDATE `users` SET `role`=':role' WHERE id = ':id'";
//не обновляется в самой БД
        Db::getInstance()->execute($sql, ['role' => $role, 'id' => $id]);
        return $role;

    }
    public  function getUserId(){
        $login = $this->getName();
        $sql = "SELECT users.id users_id FROM `users` WHERE `login` = :login";

        return Db::getInstance()->queryOne($sql, ['login' => $login]);
    }

    public function isAuth() {
        return isset($_SESSION['login']);
    }

    public function isAdmin() {
        return $_SESSION['login'] == 'admin';
    }

    public function getName() {
        return $_SESSION['login'];
    }

    protected function getEntityClass() {
        return Users::class;
    }

    public function getTableName() {
        return 'users';
    }
}