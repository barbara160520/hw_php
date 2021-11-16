<?php

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\{ProductRepository,FeedbackRepository};


class ProductController extends Controller
{


    public function actionIndex()
    {

        echo $this->render('index');
    }

    public function actionCatalog()
    {
     //   $catalog = Products::getAll();

        $page = (new Request())->getParams()['page'] ?? 0;
       $catalog = (new ProductRepository())->getLimit(($page + 1) * 2); //LIMIT 0, 2 //LIMIT 0, 4

        echo $this->render('catalog/index', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = (new ProductRepository())->getOne($id);
        $reviews = (new FeedbackRepository())->getRviews($id);

        echo $this->render('catalog/card', [
            'product' => $product,
            'reviews' => $reviews
        ]);
    }



}