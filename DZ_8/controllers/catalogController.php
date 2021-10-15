<?php

function catalogController(&$params, $action)
{

    if (empty($action)) $action = 'catalog';

    switch ($action) {
        case 'catalog':
            $params['title'] = 'Каталог';
            $params['goods'] = getGoods(); 
             
            break;
        case 'buy':
            $session = session_id();
            doFromCatalog($params,$action,$session);
        case 'like':
            doFromCatalog($params,$action,$session);
        case 'oneprod':
            $session = session_id();
            $id_product = (int)$_GET['id'];
            //не подключено
            doFromCatalog($params,$action,$session);
            doReviewsAction($params, $action);

            $params['title'] = 'Товар';
            $params['goods'] = getOneProduct($id_product);
            $params['reviews'] = getReviews($id_product);
            break;
    }
    $templateName = '/catalog/' . $action;
    return render($templateName, $params);
}
