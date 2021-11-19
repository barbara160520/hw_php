<?php
namespace app\controllers;

use app\engine\App;
use app\engine\Session;
use app\models\entities\{Orders,Basket,Users};
use app\engine\Request;
use app\models\repositories\{OrdersRepository,BasketRepository,UserRepository};

class AdminController extends Controller
{

    public function actionIndex(){
        $orders = App::call()->ordersRepository->getAll();
        echo $this->render('order/admin', [
            'orders' => $orders
        ]);
    }
    public function actionOrder()
    {
        $id = App::call()->request->getParams()['id'];
        $orders = App::call()->ordersRepository->getOne($id);
        $basket = App::call()->ordersRepository->getAllBasket($id);
        $summ = App::call()->ordersRepository->getSumm($id)[0]['summ'];

        echo $this->render('order/order', [
            'orders' => $orders,
            'basket' => $basket,
            'summ' => $summ
        ]);
    }

   public function actionDelete() {
        $id = App::call()->request->getParams()['id'];
        $error = "ok";

        $order = App::call()->ordersRepository->getOne($id);
        App::call()->ordersRepository->delete($order);

        $response = [
            'status' => $error,
            'cnt_order' => App::call()->ordersRepository->getCount()
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
    public function actionAdd() {
        $name = App::call()->request->getParams()['name'];
        $phone = App::call()->request->getParams()['phone'];
        $session_id = session_id();
      //  $id = (int)implode(App::call()->basketRepository->getBasketId($session_id));

        $user_id  = (int)implode(App::call()->userRepository->getUserId());


        if (is_null($user_id)){
            $message = "Для оформления заказа нужно авторизироваться";
            $response = [
                'success' => 'no',
                'message' => $message
            ];
        } else {
            //App::call()->basketRepository->upBasket($id,$user_id);

            $order = new Orders($name,$phone,$session_id,$user_id);

            App::call()->ordersRepository->save($order);
            $message = "Заказ оформлен";
            $response = [
                'success' => 'ok',
                'message' => $message,
                'order' => App::call()->ordersRepository->getCountWhere('session_id', $session_id)
            ];

        }
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

}