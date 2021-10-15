<?php
function newsController(&$params, $action)
{

    if (empty($action)) $action = 'news';

    switch ($action) {
        case 'news':
            $params['news'] = getNews();
            break;
        case 'onenews':
            $params['news'] = getOneNews((int)$_GET['id']);
            break;
    }

    $templateName = '/news/' . $action;

    return render($templateName, $params);
}