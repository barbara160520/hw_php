<?php
namespace app\engine;
/**
* абстрктный класс для фигур
*/
abstract class Figure {

	abstract public function getP();
	abstract public function getS();
	abstract public function info();
}