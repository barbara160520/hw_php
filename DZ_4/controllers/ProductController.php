<?php

namespace app\controllers;

use app\models\Products;

class ProductController extends RenderController
{
    public function actionCatalog()
    {
     //   $catalog = Products::getAll();
     
        $page = $_GET['page'] ?? 0;
        $catalog = Products::getLimit(($page + 1) * 2); //LIMIT 0, 2 //LIMIT 0, 4

        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = Products::getOne($id);

        echo $this->render('card', [
            'product' => $product
        ]);
    }
}