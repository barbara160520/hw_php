<?php

namespace app\controllers;

use app\engine\Request;
use app\engine\Session;
use app\models\entities\Basket;
use app\models\repositories\{BasketRepository,UserRepository};

class BasketController extends Controller
{

    public function actionIndex() {
        $session_id = session_id();
        $summ = (new BasketRepository())->getSumm($session_id)[0]['summ'];
        $basket = (new BasketRepository())->getBasket($session_id);
        echo $this->render('basket' , [
            'basket' => $basket,
            'summ' => $summ
        ]);
    }

    public function actionDelete() {
        $id = (new Request())->getParams()['id'];
        $session_id = (new Session())->getId();
        $error = "ok";

        $basket = (new BasketRepository())->getOne($id);
        if ($session_id == $basket->session_id) {
            (new BasketRepository())->delete($basket);
        } else {
            $error = "error";
        }


        $response = [
            'status' => $error,
            'count' => (new BasketRepository())->getCountWhere('session_id', $session_id)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionAdd() {
        //$id = $_POST['id'];
        $id = (new Request())->getParams()['id'];
        $session_id = session_id();
        $users_id  = implode((new UserRepository())->getUserId()); 

        $basket = new Basket($session_id, $id,$users_id); //создаем сущность с данными

        (new BasketRepository())->save($basket); //сохраним сущность через хранилище

        $response = [
            'success' => 'ok',
            'count' => (new BasketRepository())->getCountWhere('session_id', $session_id)
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
}