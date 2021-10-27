<?php
namespace app\controllers;

use app\models\{Orders,Basket};

class AdminController extends RenderController
{
    
    public function actionAdmin(){
        $orders = Orders::getAll();

        echo $this->render('admin', [
            'orders' => $orders]);
    }
    public function actionOrder()
    {
        $id = $_GET['id'];
        $orders = Orders::getOne($id);
//совершенно другие запросы будут
        $basket = Basket::getOne($id);

        echo $this->render('order', [
            'orders' => $orders,
            'basket' => $basket
        ]);
    }
}