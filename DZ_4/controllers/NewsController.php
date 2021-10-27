<?php
namespace app\controllers;

use app\models\News;

class NewsController extends RenderController
{
    public function actionNews(){
        //$news = News::getAll();

        $page = $_GET['page'] ?? 0;
       $news = News::getLimit(($page + 1) * 2); //LIMIT 0, 2 //LIMIT 0, 4

        echo $this->render('news', [
            'news' => $news,
            'page' => ++$page
        ]);
        //echo $this->render('news',$news);
    }
    public function actionNewcard()
    {
        $id = $_GET['id'];
        $news = News::getOne($id);

        echo $this->render('newcard', [
            'news' => $news
        ]);
    }
}