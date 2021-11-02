<?php
namespace app\controllers;

use app\models\{Orders,Basket};

class AdminController extends Controller
{

    public function actionAdmin(){
        $orders = Orders::getAll();

        echo $this->render('order/admin', [
            'orders' => $orders]);
    }
    public function actionOrder()
    {
        $id = $_GET['id'];
        $orders = Orders::getOne($id);
//совершенно другие запросы будут
        $basket = Basket::getOne($id);

        echo $this->render('order/order', [
            'orders' => $orders,
            'basket' => $basket
        ]);
    }
}