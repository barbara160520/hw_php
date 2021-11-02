<?php
session_start();

use app\engine\{Db,Autoload,Render,TwigRender};
use app\models\{Products, Users, Basket, Images, News, Orders, Reviews};

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);
require_once '../vendor/autoload.php';

//$controllerName = $_GET['c'] ?: 'product';



$controllerName = $_GET['c'] ?? 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
} else {
    die("404");
}





die();
/** @var Products $product */

$product = Products::getOne(6);

$product->price = 35;
$product->name = 'Рыбка';
$product->image = 'fish.png';
//$product->save();

die();
/** @var Products $product */


$user = new Users("Flora",071,071);
//$user->save();

$product2 = Products::getOne(3);
$basket = Basket::getOne(23);
//$basket->delete();

