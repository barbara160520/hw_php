<?php
namespace app\controllers;

use app\engine\App;
use app\models\entities\Reviews;
use app\engine\Request;
use app\models\repositories\FeedbackRepository;

class FeedbackController extends Controller
{

    public function actionIndex(){
        $page = App::call()->request->getParams()['page'] ?? 0;
        $reviews = App::call()->feedbackRepository->getRviews();//->getLimit(($page + 1) * 4);
        $button = 'Добавить';

        echo $this->render('feedback', [
            'reviews' => $reviews,
            'button' => $button,
            'page' => ++$page]);
    }

    public function actionDelete() {
        $id = App::call()->request->getParams()['id'];
        $error = "ok";
        $feedback = App::call()->feedbackRepository->getOne($id);

        App::call()->feedbackRepository->delete($feedback);
        $message = 'Отзыв удален';
        $response = [
            'status' => $error,
            'message' => $message
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionAdd() {
        $id_product = (int)App::call()->request->getParams()['id'];
        $name = App::call()->request->getParams()['name'];
        $comment = App::call()->request->getParams()['comment'];


        $id_product = ($id_product == 0) ? null : $id_product;

        $feed = new Reviews($name,$comment,$id_product);

        App::call()->feedbackRepository->save($feed);

        $message = 'Отзыв добавлен';
        $response = [
            'success' => 'ok',
            'message' => $message
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

/*    public function actionEdit() {
        $id_product = (int)App::call()->request->getParams()['id'];
        $name = App::call()->request->getParams()['name'];
        $comment = App::call()->request->getParams()['comment'];

        $id_product = ($id_product == 0) ? null : $id_product;

        $feed = new Reviews($name,$comment,$id_product);

        App::call()->feedbackRepository->save($feed);

        header("Location:" . $_SERVER['HTTP_REFERER']);
        die();
    }*/
}