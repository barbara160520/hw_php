<?php
namespace app\controllers;

use app\models\{Orders,Basket,Users};
use app\engine\Request;

class AdminController extends Controller
{

    public function actionIndex(){
        $orders = Orders::getAll();

        echo $this->render('order/admin', [
            'orders' => $orders]);
    }
    public function actionOrder()
    {
        $id = $_GET['id'];
        $orders = Orders::getOne($id);
        $basket = Basket::getAllBasket($id);
        $summ = Orders::getSumm($id)[0]['summ'];
        $message = "";

        echo $this->render('order/order', [
            'orders' => $orders,
            'basket' => $basket,
            'summ' => $summ,
            'message' => $message
        ]);
    }

    public function actionDelete() {
        //$id = $_POST['id'];
        $id = (new Request())->getParams()['id'];

        $order = Orders::getOne($id);

        $order->delete();

        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }

    public function actionAdd() {
        //$id = $_POST['id'];
        $name = (new Request())->getParams()['name'];
        $phone = (new Request())->getParams()['phone'];
        $session_id = session_id();
        $user_id  = implode(Users::getUserId()); 
        
        (new Orders($name,$phone,$session_id,$user_id))->insert();
       // $message = "Заказ оформлен!";


        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }
}