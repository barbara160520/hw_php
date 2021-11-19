<?php
namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\Images;
use app\models\repositories\GalleryRepository;

class GalleryController extends Controller
{

    public function actionIndex(){
        $image = App::call()->galleryRepository->getImages();

        echo $this->render('gallery/index', [
            $this->layout='gallery',
            'image' => $image]);
    }
    public function actionCard()
    {
        $id = App::call()->request->getParams()['id'];
        $image = App::call()->galleryRepository->getOne($id);

        if (!App::call()->galleryRepository->addLikes($id)){
            $message = "Такого изображения нет в БД";
        }
        echo $this->render('gallery/card', [
            $this->layout='gallery',
            'image' => $image,
            'message' => $message
        ]);
    }

}