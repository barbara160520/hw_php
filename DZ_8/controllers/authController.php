<?php
function authController(&$params, $action)
{
    if ($action == "login") {

        if (isset($_POST['send'])) {
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if (!auth($login, $pass)) {
                Die('Не верный логин пароль');
            } else {
                if (isset($_POST['save'])) {
                    updateHash();
                }
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    if ($action == "logout") {
        session_destroy();
        setcookie("hash", "", time() - 36000, '/');
        header("Location: /");

    }
}