<?php

function adminController(&$params, $action)
{
    if (!is_admin()) Die('Нет прав!');

    if (empty($action)) $action = 'admin';

    switch ($action) {
        case 'admin':
            $params['title'] = 'Заказы';
            $params['orders'] = getOrders();
            break;
        case 'delete':
            deleteOrders($_GET['id']);
        case 'oneorder':
            $params['title'] = 'Заказы';
            $params['orders'] = getOneOrder((int)$_GET['id']);
            $params['basket'] = allBasket((int)$_GET['id']);
            $params['summ'] = summOrder((int)$_GET['id']);
            break;
    }

    $templateName = '/admin/' . $action;

    return render($templateName, $params);
}