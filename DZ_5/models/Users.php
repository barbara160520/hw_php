<?php

namespace app\models;

class Users extends DBModel
{
    protected $id;
    protected $login;
    protected $pass;
    protected $hash;
    protected $role;

    protected $props = [
        'login' => false,
        'pass' => false,
        'hash' => false,
        'role' => false
    ];

    public function __construct($login = null, $pass = null,$hash=null,$role = 0)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $hash;
        $this->role = $role;
    }


    public static function getTableName() {
        return 'users';
    }

    public static function updateHash(){
        $hash = uniqid(rand(), true);
        $id = (int)$_SESSION['id'];
        //save("UPDATE `users` SET `hash` = '{$hash}' WHERE `users`.`id` = {$id}");
        setcookie("hash", $hash, time() + 36000, '/');

    }

    public static function auth($login, $pass){
        
        return true;
        /*$login = mysqli_real_escape_string(getDb(), strip_tags(stripslashes($login)));
        $passDb = getAssocResult("SELECT * FROM users WHERE login = '{$login}'")[0];
        if (password_verify($pass, $passDb['pass'])) {
    
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $passDb['id'];
            $_SESSION['role'] = $passDb['role'];
            return true;
        }
        return false;*/
    }

    public static function is_admin()
    {
        return ($_SESSION['role'] == 1) ? true : false;
    }

    public static function is_auth()
    {
        /*if (isset($_COOKIE["hash"]) && !isset($_SESSION['login'])) {
            $hash = $_COOKIE["hash"];
            $user = getAssocResult("SELECT * FROM `users` WHERE `hash`='{$hash}'")[0]['login'];
            if (!empty($user)) {
                $_SESSION['login'] = $user;
            }
        }*/
        return isset($_SESSION['login']);
    }


    public static function get_user()
    {
        return $_SESSION['login'];

    }

}