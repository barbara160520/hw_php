<?php
namespace app\controllers;

use app\models\Images;

class GalleryController extends RenderController
{
    private $layout = 'gallery';
    public function actionGallery(){
        $image = Images::getAll();

        echo $this->render('gallery', [
            'image' => $image]);
    }
    public function actionImagecard()
    {
        $id = $_GET['id'];
        $image = Images::getOne($id);

        echo $this->render('imagecard', [
            'image' => $image
        ]);
    }
}