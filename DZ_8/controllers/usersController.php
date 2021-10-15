<?php

function usersController(&$params, $action)
{
    if (!is_admin()) Die('Нет прав!');
    
    if (empty($action)) $action = 'users';

    $params['users'] = getUsers();

    $templateName = '/users/' . $action;

    return render($templateName, $params);
}