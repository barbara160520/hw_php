<?php

function prepareVariables($page) {


    $params = ['menu' => getMenu()['menu']];
    $params['layout'] = 'main';

    switch ($page) {
        case 'index':
            $params['title'] = 'Главная';
            break;

        case 'news':
            $params['news'] = getNews();
            break;

        case 'onenews':
            $id = (int)$_GET['id'];
            $params['news'] = getOneNews($id);
            break;


        case 'feedback':
            /*$api = '';
            doFeebackAction($api);*/
            $params['buttonText'] ='Добавить';
            $params['feedbacks'] = getAllFeedback();
            break;

        case 'bux':
            /*        if (!empty($_FILES)) {
                        $message = upload();
                        header($message);
                    }*/
            $params['message'] = 'Файл загружен';
            $params['title'] = 'Бухи';
            $params['files'] = getFiles();
            break;

        case 'gallery':
            $params['title'] = 'Галерея';
            $params['image'] = getImages();
            $params['layout'] = 'gallery';
            break;

        case 'oneimage':
            addLikes($_GET['id']);
            $params['image'] = getOneImage($_GET['id']);
            $params['layout'] = 'gallery';
            break;

        case 'catalogssr':
            $params['title'] = 'Каталог';
            $params['catalog'] = getCatalog();
            break;

        case 'oneprod':
            $params['title'] = 'Товар';
            $id = (int)$_GET['id'];
            $params['catalog'] = getOneProduct($id);
            $params['feedbacks'] = getProdFeedback($id);
            break;

        case 'catalogspa':
            $params['title'] = 'Каталог spa';
            break;

        case 'about':
            $params['title'] = 'about';
            $params['phone'] = 79281444333;
            break;

        case 'calc':
            $params['title'] = 'Калькулятор';
            break;

        case 'apicatalog':
            echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
            die();
    }
    return $params;
}