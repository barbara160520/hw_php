<?php

namespace app\controllers;
use app\models\Users;

class AuthController extends Controller
{
    public function actionLogin() {
        //action="/auth/login"
        //form action='/?c=auth&a=login'


		if (isset($_POST['send'])) {
            $login = $_POST['login'];
            $pass = $_POST['pass'];

            if (!Users::auth($login, $pass)) {
                Die('Не верный логин пароль');
            } else {
                if (isset($_POST['save'])) {
                    Users::updateHash();
                }
                //$auth = true;
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
        $auth = Users::auth($login,$pass);
        echo $this->render( [
            'auth' => $auth]);
    }

    public function actionLogout() {
    	session_destroy();
        setcookie("hash", "", time() - 36000, '/');
        header("Location: /");
    }


}