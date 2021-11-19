<?php
namespace app\controllers;

use app\engine\App;
use app\models\News;
use app\engine\Request;
use app\models\repositories\NewsRepository;

class NewsController extends Controller
{
    public function actionNews(){
        $page = App::call()->request->getParams()['page'] ?? 0;
        $news = App::call()->newsRepository->getLimit(($page + 1) * 2); //LIMIT 0, 2 //LIMIT 0, 4

        echo $this->render('news/index', [
            'news' => $news,
            'page' => ++$page
        ]);

    }
    public function actionCard()
    {
        $id = App::call()->request->getParams()['id'];
        $news = App::call()->newsRepository->getOne($id);

        if (!App::call()->newsRepository->addLikes($id)){
            $message = "Такого изображения нет в БД";
        }
        echo $this->render('news/card', [
            'news' => $news,
            'message' => $message
        ]);
    }

    public function actionDelete() {
        $id = App::call()->request->getParams()['id'];
        $error = "ok";
        $new = App::call()->newsRepository->getOne($id);

        App::call()->newsRepository->delete($new);

        $response = [
            'status' => $error
        ];
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }
}