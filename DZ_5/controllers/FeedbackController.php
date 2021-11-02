<?php
namespace app\controllers;

use app\models\Reviews;

class FeedbackController extends Controller
{
    
    public function actionFeedback(){
        $page = $_GET['page'] ?? 0;
        $reviews = Reviews::getLimit(($page + 1) * 4);
        $button = 'Добавить';

        echo $this->render('feedback', [
            'reviews' => $reviews,
            'button' => $button,
            'page' => ++$page]);
    }
}