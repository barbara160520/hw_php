<?php

use app\engine\{Db,Autoload};
use app\models\{Products, Users, Basket, Images, News, Orders, Reviews};


include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Products("Fish","fish.jpg","Самая вкусная рыба!!",25);
//$product->insert();

$user = new Users("Flora",071,071);
//$user->insert(); 

$product2 = Products::getOne(3);
$basket = Basket::getOne(23);
//$basket->delete(); 

var_dump($product,$product2,$user,$basket);

//не понятно как обновлять данные по выбора, например только цену
//$product->update(4);

//проверка
$img = Images::getOne(3);
$ord = Orders::getAll();
$new = News::getOne(5);
$rew = Reviews::getOne(50);
//var_dump($img,$ord,$new,$rew);