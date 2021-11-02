<?php
namespace app\controllers;

use app\models\News;

class NewsController extends Controller
{
    public function actionNews(){
        //$news = News::getAll();

        $page = $_GET['page'] ?? 0;
       $news = News::getLimit(($page + 1) * 2); //LIMIT 0, 2 //LIMIT 0, 4

        echo $this->render('news/index', [
            'news' => $news,
            'page' => ++$page
        ]);
        //echo $this->render('news',$news);
    }
    public function actionCard()
    {
        $id = $_GET['id'];
        $news = News::getOne($id);

        echo $this->render('news/card', [
            'news' => $news
        ]);
    }
}