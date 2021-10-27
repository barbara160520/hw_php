<?php
namespace app\controllers;

use app\models\Basket;

class BasketController extends RenderController
{
    public function actionBasket(){
        $basket = Basket::getAll();
//не понимаю как сделать определенный запрос с дополнительным where по session_id
        $summ = 0;
        echo $this->render('basket', ['basket' => $basket,'summ' => $summ]);
    }

}