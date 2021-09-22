<?php
print("Задание №7<br>");

$t = time();
function getMin($min){
		switch (substr($min,-1)) {
		case '1':
			return $min." минута ";
			break;
		case '0':
		case '5':
		case '6':
		case '7':
		case '8':
		case '9':
			return $min." минут ";
			break;
		case '2':
		case '3':
		case '4':
			return $min." минуты ";
			break;
	}
}

function getHour($hour){
		switch (substr($hour,-1)) {
		case '1':
			return $hour." час ";
			break;
		case '0':
		case '5':
		case '6':
		case '7':
		case '8':
		case '9':
			return $hour." часов ";
			break;
		case '2':
		case '3':
		case '4':
			return $hour." часа ";
			break;
	}
}
function cur_time($t){
	$min = date('i',$t);
	$hour = date('H',$t);

	$min = getMin($min);
	$hour = getHour($hour);

	return $hour.$min;
}

echo cur_time($t);