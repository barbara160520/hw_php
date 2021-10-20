<?php
namespace app\models;
use app\engine\Figure;

class Triangle extends Figure
{
	private $arg_1;
	private $arg_2;
	private $arg_3;
	private $name;

	public function __construct($arg_1,$arg_2,$arg_3,$name){
		$this->arg_1 = $arg_1;
		$this->arg_2 = $arg_2;
		$this->arg_3 = $arg_3;
		$this->name = $name;
	}
	public function getP()
	{
		return $this->arg_1 + $this->arg_2 + $this->arg_3;
	}
	public function getS(){
		$p = $this->getP($arg_1,$arg_2,$arg_3)/2;
		return sqrt($p*($p-$this->arg_1)*($p-$this->arg_2)*($p-$this->arg_3));
	}
	public function info(){

		return "Это {$this->name} с площядю равной {$this->getS($arg_1)}m2 и периметром {$this->getP($arg_1,$arg_2,$arg_3)}m,<br> где сторона А = {$this->arg_1}m, В = {$this->arg_2}m, С = {$this->arg_3}m.";
	}
}