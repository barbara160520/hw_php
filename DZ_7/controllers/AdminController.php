<?php
namespace app\controllers;
use app\engine\Session;
use app\models\entities\{Orders,Basket,Users};
use app\engine\Request;
use app\models\repositories\{OrdersRepository,BasketRepository,UserRepository};

class AdminController extends Controller
{

    public function actionIndex(){
        $orders = (new OrdersRepository())->getAll();

        echo $this->render('order/admin', [
            'orders' => $orders]);
    }
    public function actionOrder()
    {
        $id = (new Request())->getParams()['id'];
        $orders = (new OrdersRepository())->getOne($id);
        $basket = (new OrdersRepository())->getAllBasket($id);
        $summ = (new OrdersRepository())->getSumm($id)[0]['summ'];

        echo $this->render('order/order', [
            'orders' => $orders,
            'basket' => $basket,
            'summ' => $summ
        ]);
    }

   public function actionDelete() {
        $id = (new Request())->getParams()['id'];
        $error = "ok";

        $order = (new OrdersRepository())->getOne($id);
        (new OrdersRepository())->delete($order);

        $response = [
            'status' => $error
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
    public function actionAdd() {
        $name = (new Request())->getParams()['name'];
        $phone = (new Request())->getParams()['phone'];
        $session_id = session_id();
        $user_id  = implode((new UserRepository())->getUserId()); 
        
        if (is_null($user_id)){
            die('Нужно авторизоваться');
        } else {
            $order = new Orders($name,$phone,$session_id,$user_id);
            (new OrdersRepository())->insert($order);

            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();
        }
    }

}