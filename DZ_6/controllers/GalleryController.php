<?php
namespace app\controllers;

use app\models\Images;

class GalleryController extends Controller
{

    public function actionIndex(){
        $image = Images::getImages();

        echo $this->render('gallery/index', [
            $this->layout='gallery',
            'image' => $image]);
    }
    public function actionImagecard()
    {
        $id = $_GET['id'];
        $image = Images::getOne($id);

        echo $this->render('gallery/card', [
            $this->layout='gallery',
            'image' => $image
        ]);
    }
}