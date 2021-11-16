<?php
namespace app\controllers;

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\UserRepository;


class UsersController extends Controller
{
    public function actionIndex(){
        $users = (new UserRepository())->getAll();

        echo $this->render('users', [
            'users' => $users]);
    }

    public function actionToggleAdmin(){
        $id = (new Request())->getParams()['id'];
       // $role = (new Request())->getParams()['role'];

        if ((new UserRepository())->isAdmin()){
            if ((new UserRepository())->toggleAdmin($id) == 1){
                $text = "Снять админа";
            } else {
                $text = "Назначить админа";
            };
            $response = [
                'success' => 'ok',
                'role' => (new UserRepository())->toggleAdmin($id),
                'text' => $text
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            die();
        }

    }
}