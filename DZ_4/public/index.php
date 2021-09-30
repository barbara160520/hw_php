<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
//include "config/config.php";

$url_array = explode('/', $_SERVER['REQUEST_URI']);


if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}

$params = ['menu' => getMenu()['menu']];
$layout = 'main';
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

    case 'bux':
      //  $params['layout'] = 'bux';
/*        if (!empty($_FILES)) {
            upload();
            header();
        }*/
        $params['message'] = 'Файл загружен';
        $params['title'] = 'Бухи';
        $params['files'] = getFiles();
        break;

    case 'catalogssr':
        $params['title'] = 'Каталог';
        $params['catalog'] = getCatalog()['catalog'];
        break;

    case 'catalogspa':
        $params['title'] = 'Каталог spa';
        break;

    case 'gallery':
        $params['title'] = 'Галерея';
        $layout = 'gallery';
        $params['gallery'] = getGallery(IMG_BIG);
        $params['message'] = $message;
        break;

    case 'about':
        $params['title'] = 'about';
        $params['phone'] = 79281444333;
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}

echo render($page, $params, $layout);

function getMenu(){
        return [
        'menu' => [
            [
                'name' => 'Главная',
                'href' => "/"
            ],
            [
                'name' => 'Каталог spa',
                'href' => "/catalogspa"
            ],
            [
                'name' => 'Каталог ssr',
                'href' => "/catalogssr"
            ],
            [
                'name' => 'О нас',
                'href' => "/about",
            ],
            [
                'name' => 'Галерея',
                'href' => "/gallery",
            ],
            [
                'name' => 'Бугалтеря',
                'href' => "/bux",
            ],
            [
                'name' => 'Новости',
                'href' => "/news",
            ]
        ]
    ];
}