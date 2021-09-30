<?php
include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

$url_array = explode('/', $_SERVER['REQUEST_URI']);


if ($url_array[1] == "") {
    $page = 'image';
} else {
    $page = $url_array[1];
}

$layout = 'main';
switch ($page) {
    case 'image':
        $params['image'] = getImages();
        break;

    case 'oneimage':
        $id = (int)$_GET['id'];
        $params['image'] = getOneImage($id);
        break;
}

echo render($page, $params, $layout);
