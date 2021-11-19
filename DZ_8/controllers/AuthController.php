<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\entities\Users;
use app\models\repositories\UserRepository;


class AuthController extends Controller
{
    public function actionLogin() {
        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];

        if (App::call()->userRepository->auth($login, $pass)) {
            if (isset(App::call()->request->getParams()['save'])){
                $id = App::call()->session->getId();
                $hash = uniqid(rand(), true);
                App::call()->userRepository->upHashUser($hash,$id);
                setcookie("hash", $hash, time() + 3600); 
            }
            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            die("Не верный логин пароль");
        }
    }

    public function actionLogout() {
        setcookie("hash", "", time()-1, "/");
        App::call()->session->regenerate();
        App::call()->session->destroy();
        header("Location: /");
        die();
    }
}