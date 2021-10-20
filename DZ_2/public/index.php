<?php

use app\engine\{Db,Figure};
use app\models\{Products, Users, Basket, Orders,Rectangle,Circle,Triangle};

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);


$db = new Db();

$rectangle = new Rectangle(50,5,'Прямоугольник');
echo "Периметр = " . $rectangle->getP() . "m<br>";
echo "Площадь = " . $rectangle->getS() . "m2<br>";
echo $rectangle->info() . "<br><br>";

$circle  = new Circle(6,"Круг");
echo "Периметр = " .  $circle->getP() . "m<br>";
echo "Площадь = " . $circle->getS() . "m2<br>";
echo $circle->info() . "<br><br>";

$triangle  = new Triangle(15,14,13,"Треугольнк");
echo "Периметр = " .  $triangle->getP() . "m<br>";
echo "Площадь = " . $triangle->getS() . "m2<br>";
echo $triangle->info() . "<br><br>";

$product = new Products($db);

$product->name = "чай";

$user = new Users($db);
$basket = new Basket($db);
$order = new Orders($db);

echo $product->getOne(2);
echo $product->getAll();

echo $user->getOne(3);
echo $user->getAll();

echo $basket->getOne(4);
echo $basket->getAll();

echo $order->getOne(5);
echo $order->getAll();