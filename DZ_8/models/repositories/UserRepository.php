<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Users;
use app\models\Repository;

class UserRepository extends Repository
{
    public function auth($login, $pass) {

        $user = $this->getOneWhere('login', $login); 

        if ($user != false && password_verify($pass, $user->hash)) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public function isAuth() {
        if (!isset($_SESSION['login']) && isset($_COOKIE['hash'])) {
            $hash = $_COOKIE["hash"];
            $user = App::call()->db->queryOne("SELECT * FROM users WHERE `hash`=:hash",['hash' => $hash]);
            if($user){
                $user = $user['login'];
                if(!empty($user)){
                    $_SESSION['login'] = $user;
                }
            }
        }
        return isset($_SESSION['login']);
    }

    public function isAdmin() {
        return $_SESSION['login'] == 'admin';
    }

    public function getName() {
        return $_SESSION['login'];
    }

    public function upHashUser($hash,$id) {
        $sql = "UPDATE `users` SET `hash` = :hash WHERE `id`= :id";
        App::call()->db->execute($sql, ['hash' => $hash, 'id' => $id]);

    }

    public function toggleAdmin($id)
    {
        $role = App::call()->db->queryOne("SELECT `role` FROM `users` WHERE `id`= :id",['id' => $id]);
        $role = (int)implode($role);

        $role = ($role == 0) ? 1 : 0 ;

        return $role;
    }
    public function upRole($id,$role){
        $sql = "UPDATE `users` SET `role`= :role WHERE id = :id";
        return  App::call()->db->execute($sql, ['role' => $role, 'id' => $id]);

    }

    public  function getUserId(){
        $login = $this->getName();
        $sql = "SELECT users.id users_id FROM `users` WHERE `login` = :login";

        return App::call()->db->queryOne($sql, ['login' => $login]);
    }

    protected function getEntityClass() {
        return Users::class;
    }

    public function getTableName() {
        return 'users';
    }
}