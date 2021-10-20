<?php
namespace app\models;
use app\engine\Figure;

class Rectangle extends Figure
{
	private $arg_1;
	private $arg_2;
	private $name;

	public function __construct($arg_1,$arg_2,$name){
		$this->arg_1 = $arg_1;
		$this->arg_2 = $arg_2;
		$this->name = $name;
	}
	public function getP()
	{
		return $this->arg_1 + $this->arg_2;
	}
	public function getS(){

		return $this->arg_1 * $this->arg_2;
	}
	public function info(){

		return "Это {$this->name} с площядю равной {$this->getS($arg_1,$arg_2)}m2 и периметром {$this->getP($arg_1,$arg_2)}m,<br> где сторона А = {$this->arg_1}m, В = {$this->arg_2}m.";
	}
}