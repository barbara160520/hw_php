<?php
session_start();


use app\engine\Request;
use app\engine\TwigRender;
use app\engine\Render;
//use app\engine\Autoload;
include "../config/config.php";
/*
include "../engine/Autoload.php";
spl_autoload_register([new Autoload(), 'loadClass']);*/

require_once '../vendor/autoload.php';

try {

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

} catch (\PDOException $e) {
    var_dump($e->getMessage());
} catch (\Exception $e) {
    var_dump($e);
}

