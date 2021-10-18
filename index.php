<?php
class Hall
{
    public $id;
    public  $name;
    public $price;

    public function __construct($id = null, $name = null, $price = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /*public function getHall(){
        
    }*/

    function info()
    {
        echo "Зал: '{$this->name}', цена за вход: {$this->price}$<br><hr><br>";
    }
}

class Trainer
{
    public $id;
    public $name;
    public $watch;
    public $hall;
    public $phone;


    public function __construct($id = null, $name = null, $watch = null, $hall = null, $phone = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->watch = $watch;
        $this->hall = $hall;
        $this->phone = $phone;
    }

    function info()
    {
        echo "Имя: {$this->name}, Телефон: {$this->phone}<br>";
    }
}

class Members extends Trainer
{
    public $adress;
    public $b_day;
    public $gender;

    public function __construct($id = null, $name = null,$watch = null, $hall = null, $phone = null, $adress = null, $b_day = null, $gender = null)
    {
        $this->adress = $adress;
        $this->b_day = $b_day;
        $this->gender = $gender;
        parent::__construct($id, $name,$watch, $phone, $hall);
    }

    public function info()
    {
        parent::info();
        echo "ДР: {$this->b_day}, Адрес: {$this->adress} <br>";
    }
}

$emloye1 = new Trainer(23, 'Alex', 1, 'pool', 7982845632);
$emloye2 = new Trainer(03, 'Phual', 2, 'yoga', 79889455632);
$user1 = new Members(5, 'Lila','', 89271456321,2, 'USA,New-York,st. Gharison 5B','05.08.2004', 'female');
$hall1= new Hall(1,'pool',15);
$hall2= new Hall(2,'yoga',20);

function displayInfo(Trainer $obj)
{
    $obj->info();
}

displayInfo($emloye1);
displayInfo($emloye2);
displayInfo($user1);

$hall2->info();
/*
 функция foo() принадлежит классу АA
 static $x тоже пренадлежит классу АA
 ++$x Увеличивает $x на единицу, затем возвращает значение $x.
*/
class AA {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new AA();
$a2 = new AA();
$a1->foo();// выводит 1
$a2->foo();// выводит 2
$a1->foo();// выводит 3
$a2->foo();// выводит 4

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
/*
Класс В наследует класс А.
*/
class B extends A {
}
$a1 = new A();
$b1 = new B();
echo '<br>';
$a1->foo(); // тут функция foo() принадлежит классу А и выводит 1
$b1->foo(); // тут функция foo() принадлежит классу В и выводит 1
$a1->foo(); // тут функция foo() принадлежит классу А и выводит 2
$b1->foo();// тут функция foo() принадлежит классу В и выводит 2

class AF {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class BF extends AF {
}
//отсутствуют () при объявлении экземпляра
$a1 = new AF;
$b1 = new BF;
echo '<br>';
$a1->foo(); // тут функция foo() принадлежит классу АF и выводит 1
$b1->foo(); // тут функция foo() принадлежит классу BF и выводит 1
$a1->foo(); // тут функция foo() принадлежит классу АF и выводит 2
$b1->foo(); // тут функция foo() принадлежит классу BF и выводит 2