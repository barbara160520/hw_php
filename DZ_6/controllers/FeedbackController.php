<?php
namespace app\controllers;

use app\models\Reviews;
use app\engine\Request;

class FeedbackController extends Controller
{
    
    public function actionFeedback(){
        $page = $_GET['page'] ?? 0;
        $reviews = Reviews::getRviews();//->getLimit(($page + 1) * 4);
        $button = 'Добавить';

        echo $this->render('feedback', [
            'reviews' => $reviews,
            'button' => $button,
            'page' => ++$page]);
    }

    public function actionDelete() {
        //$id = $_POST['id'];
        $id = (new Request())->getParams()['id'];

        $feedback = Reviews::getOne($id);

        $feedback->delete();

        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }

    public function actionAdd() {
        //$id = $_POST['id'];
        //product_$id = (new Request())->getParams()['id'];
        $name = (new Request())->getParams()['name'];
        $comment = (new Request())->getParams()['comment'];
        

        (new Reviews($name,$comment))->save();

        header("Location: /feedback/feedback");
        die();
    }
}