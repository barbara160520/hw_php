<?php
namespace app\controllers;

use app\models\entities\Reviews;

use app\engine\Request;

use app\models\repositories\FeedbackRepository;

class FeedbackController extends Controller
{
    
    public function actionIndex(){
        $page = (new Request())->getParams()['page'] ?? 0;
        $reviews = (new FeedbackRepository())->getRviews();//->getLimit(($page + 1) * 4);
        $button = 'Добавить';

        echo $this->render('feedback', [
            'reviews' => $reviews,
            'button' => $button,
            'page' => ++$page]);
    }

    public function actionDelete() {
        $id = (new Request())->getParams()['id'];
        $error = "ok";
        $feedback = (new FeedbackRepository())->getOne($id);

        (new FeedbackRepository())->delete($feedback);

        $response = [
            'status' => $error
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionAdd() {
        $id_product = (new Request())->getParams()['id'];
        $name = (new Request())->getParams()['name'];
        $comment = (new Request())->getParams()['comment'];

        $feed = new Reviews($name,$comment,$id_product);

        (new FeedbackRepository())->insert($feed);

        if ((new FeedbackRepository())->insert($feed) == true){
            header("Location:" . $_SERVER['HTTP_REFERER']);
            die();
        }else {
            die("Ошибка данных");
        }

    }
   /* public function actionEdit() {
        $product_id = (new Request())->getParams()['id_product'];
        $name = (new Request())->getParams()['name'];
        $comment = (new Request())->getParams()['comment'];

        $feed = new Reviews($name,$comment,$product_id);
        (new FeedbackRepository())->update($feed);


        $response = [
            'success' => 'ok'
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }*/
}