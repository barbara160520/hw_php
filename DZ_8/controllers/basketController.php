<?php
function basketController(&$params, $action)
{
    if (empty($action)) $action = 'basket';

    $session = session_id();
    
    doFromBasket($params,$action,$session);

    $params['title'] = 'Корзина';
    $params['basket'] = getBasket($session);
    $params['summ'] = getSumm($session);

    $templateName = '/basket/' . $action;

    return render($templateName, $params);
}