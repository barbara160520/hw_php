<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Session;
use app\engine\App;
use app\models\entities\Basket;
use app\models\repositories\{BasketRepository,UserRepository};

class BasketController extends Controller
{

    public function actionIndex() {
        $session_id = session_id();
        $summ = App::call()->basketRepository->getSumm($session_id)[0]['summ'];
        $basket = App::call()->basketRepository->getBasket($session_id);
        echo $this->render('basket' , [
            'basket' => $basket,
            'summ' => $summ
        ]);
    }

    public function actionDelete() {
        $id = App::call()->request->getParams()['id'];
        $session_id = App::call()->session->getId();
        $error = "ok";

        $basket = App::call()->basketRepository->getOne($id);
        if ($session_id == $basket->session_id) {
            App::call()->basketRepository->delete($basket);
            $summ = App::call()->basketRepository->getSumm($session_id)[0]['summ'];
        } else {
            $error = "error";
        }


        $response = [
            'status' => $error,
            'count' => App::call()->basketRepository->getCountWhere('session_id', $session_id),
            'summ' => $summ
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionAdd() {
        $id = App::call()->request->getParams()['id'];
        $session_id = session_id();
        $user_id  = (int)implode(App::call()->userRepository->getUserId());


        $user_id = ($user_id == 0) ? null : $user_id ;

        $basket = new Basket($session_id, $id,$user_id); //создаем сущность с данными

        App::call()->basketRepository->save($basket); //сохраним сущность через хранилище

        $response = [
            'success' => 'ok',
            'count' => App::call()->basketRepository->getCountWhere('session_id', $session_id)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
}