<?php
namespace app\models;
use app\engine\Figure;

class Circle extends Figure
{
	private $R;
	private $pi = 3.14;
	private $name;

	public function __construct($R,$name){
		$this->R = $R;
		$this->name = $name;
	}
	public function getP()
	{
		return $this->pi*2 * $this->R;
	}
	public function getS(){

		return $this->pi * $this->R*$this->R;
	}
	public function info(){

		return "Это {$this->name} с площядю равной {$this->getS($arg_1,$arg_2)}m2 и периметром {$this->getP($arg_1,$arg_2)}m,<br> где радиус R = {$this->R}m.";
	}
}