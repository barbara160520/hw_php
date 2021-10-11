<?php
session_start();
//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
//Первым делом подключим файл с константами настроек

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
$url_array = explode('/', $_SERVER['REQUEST_URI']);
//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
if ($url_array[2] != "") {
    $action = $url_array[2];
} else {
    $action = "";
}
if ($url_array[1] == "") {
    $page = 'index';

} else {
    $page = $url_array[1];
}

$params = prepareVariables($page,$action);

echo render($page, $params);

