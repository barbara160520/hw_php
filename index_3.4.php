<?php
print("Задание №3 и №4<br>");

$arg1 = 58;
$arg2 = 0;
$operation = "div";
echo "Данны числа ${arg1} и ${arg2}.<br>";

function sum($a,$b){
	return $a+$b." сумма<br>";
}

function diff($a,$b){
	return $a-$b." разность<br>";
}

function mult($a,$b){
	return $a*$b." произведение<br>";
}

function div($a,$b){
	if ($b==0){
		return "На ноль делить нельзя!!<br>";
	}
	else return round($a/$b,2)." деление<br>";
}

function mathOperation($arg1, $arg2, $operation){
	   switch ($operation) {
        case "sum":
            echo sum($arg1,$arg2);
            break;
		case "diff":
			echo diff($arg1,$arg2);
			break;
		case "mult":
			echo mult($arg1,$arg2);
			break;
		case "div":
			echo div($arg1,$arg2);
			break;
        }
}

echo mathOperation($arg1, $arg2, $operation);