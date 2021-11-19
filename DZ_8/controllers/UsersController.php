<?php
namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\repositories\UserRepository;


class UsersController extends Controller
{
    public function actionIndex(){
        $users = App::call()->userRepository->getAll();

        echo $this->render('users', [
            'users' => $users]);
    }

    public function actionToggleAdmin(){
        $id = App::call()->request->getParams()['id'];
       // $role = (new Request())->getParams()['role'];

        if (App::call()->userRepository->isAdmin()){
            $role = App::call()->userRepository->toggleAdmin($id);
            if ($role == 1){
                $text = "Снять админа";
                App::call()->userRepository->upRole($id,$role);

            } else {
                $text = "Назначить админа";
                App::call()->userRepository->upRole($id,$role);
            };
            $response = [
                'success' => 'ok',
                'role' => App::call()->userRepository->toggleAdmin($id),
                'text' => $text
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            die();
        }

    }
}