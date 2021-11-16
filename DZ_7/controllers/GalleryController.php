<?php
namespace app\controllers;
use app\engine\Request;
use app\models\Images;
use app\models\repositories\GalleryRepository;

class GalleryController extends Controller
{

    public function actionIndex(){
        $image = (new GalleryRepository())->getImages();

        echo $this->render('gallery/index', [
            $this->layout='gallery',
            'image' => $image]);
    }
    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $image = (new GalleryRepository())->getOne($id);
        
        if (!(new GalleryRepository())->addLikes($id)){
            $message = "Такого изображения нет в БД";
        }
        echo $this->render('gallery/card', [
            $this->layout='gallery',
            'image' => $image,
            'message' => $message
        ]);
    }

}