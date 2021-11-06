<?php
namespace app\controllers;

use app\models\Users;

class UsersController extends Controller
{
    public function actionIndex(){
        $users = Users::getAll();

        echo $this->render('users', [
            'users' => $users]);
    }
}