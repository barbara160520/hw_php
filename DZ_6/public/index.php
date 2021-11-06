<?php
session_start();

//use app\models\{Products, Users};

use app\engine\Autoload;
use app\engine\Db;
use app\engine\Request;
use app\engine\TwigRender;
use app\models\Products;
use app\models\Users;
use app\engine\Render;

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);
//require_once '../vendor/autoload.php';

$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    die("404");
}





die();
/** @var Products $product */

$product = Products::getOne(2);

$product->name = "Чай2";
$product->price = 34;

var_dump($product);
$product->update();
die();


var_dump($product);
var_dump($product);
//$product->save();


$product = new Products("Пицца", "Описание", 125);

$product->save();

//$user = new Users("User", 125);
//$user->save();
//
//$product = new Products("Пицца","Описание", 125);
//$product->save();

