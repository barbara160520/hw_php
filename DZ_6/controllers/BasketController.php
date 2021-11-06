<?php

namespace app\controllers;

use app\engine\Request;
use app\models\{Basket, Users};

class BasketController extends Controller
{

    public function actionIndex() {
        $session_id = session_id();
        $basket = Basket::getBasket($session_id);
        $summ = Basket::getSumm($session_id)[0]['summ'];
        $message = "";

        echo $this->render('basket' , [
            'basket' => $basket,
            'summ' => $summ,
            'message' => $message
        ]);
    }

    public function actionAdd() {
        //$id = $_POST['id'];
        $id = (new Request())->getParams()['id'];
        $session_id = session_id();
        $users_id  = implode(Users::getUserId()); 

        (new Basket($session_id, $id,$users_id))->save();

        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }

    public function actionDelete() {
        //$id = $_POST['id'];
        $id = (new Request())->getParams()['id'];
        $basket = Basket::getOne($id);

        $basket->delete();

        header("Location: /basket");
        die();
    }

}