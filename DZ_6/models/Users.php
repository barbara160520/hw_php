<?php

namespace app\models;
use app\engine\Db;

class Users extends DBModel
{
    protected $id;
    protected $login;
    protected $pass;

    protected $props = [
        'login' => false,
        'pass' => false
    ];

    protected function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public static function auth($login, $pass) {
        $user = Users::getOneWhere('login', $login);
        //TODO проверить user на false
        if ($user == true)
        {
            $hash = password_hash($login, PASSWORD_DEFAULT);
            if (password_verify($login, $hash)){
              //  var_dump(password_verify($login, $hash));
                if ($pass == $user->pass) {
                    $_SESSION['login'] = $login;
                    return true;
                }
            }
        }
        return false;
        //TODO захешируйте пароль
        //password_hash('123', PASSWORD_DEFAULT);
        //password_verify('123', $hash);
        /*if ($pass == $user->pass) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;*/

    }

    public static function getUserId(){
        $login = Users::getName();
        $sql = "SELECT users.id users_id FROM `users` WHERE `login` = :login";

        return Db::getInstance()->queryOne($sql, ['login' => $login]);
    }

    public static function isAuth() {
        return isset($_SESSION['login']);
    }

    public static function isAdmin() {
        return $_SESSION['login'] == 'admin';
    }

    public static function getName() {
        return $_SESSION['login'];
    }

    protected static function getTableName() {
        return 'users';
    }

}