<?php
namespace app\controllers;

use app\models\News;
use app\engine\Request;
use app\models\repositories\NewsRepository;

class NewsController extends Controller
{
    public function actionNews(){
        $page = (new Request())->getParams()['page'] ?? 0;
        $news = (new NewsRepository())->getLimit(($page + 1) * 2); //LIMIT 0, 2 //LIMIT 0, 4

        echo $this->render('news/index', [
            'news' => $news,
            'page' => ++$page
        ]);
        
    }
    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $news = (new NewsRepository())->getOne($id);

        if (!(new NewsRepository())->addLikes($id)){
            $message = "Такого изображения нет в БД";
        }
        echo $this->render('news/card', [
            'news' => $news,
            'message' => $message
        ]);
    }

    public function actionDelete() {
        $id = (new Request())->getParams()['id'];
        $error = "ok";
        $new = (new NewsRepository())->getOne($id);

        (new NewsRepository())->delete($new);

        $response = [
            'status' => $error
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
}