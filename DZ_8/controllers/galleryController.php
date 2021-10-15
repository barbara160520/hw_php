<?php

function galleryController(&$params, $action)
{

    if (empty($action)) $action = 'gallery';

    switch ($action) {
        case 'gallery':
            if (isset($_POST['load'])) {
                loadImage();
            }

            $params['layout'] = 'gallery';
            $params['image'] = getImages(IMG_BIG);
            break;
        case 'oneimage':
            $params['layout'] = 'gallery';
            if (addLikes($_GET['id'])) {
                $params['message'] = "Такого изображения нет в БД";
            };
            $params['image'] = getOneImage($_GET['id']);
            break;
    }

    $templateName = '/gallery/' . $action;

    return render($templateName, $params);
}