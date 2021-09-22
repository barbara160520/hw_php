<?php
print("Задание №1<br>");
    $a = 0;
    $b = -9;
    $answer = "";

    if ($a>=0 && $b>=0){
        echo $answer = "Числа a и b положительные<br><br>";
    } else if ($a<0 && $b<0){
        echo $answer = "Числа a и b отрицательные<br><br>";
    } else echo $answer = "Числа a и b разных знаков<br><br>";
?>
<?php
print("Задание №2<br>");
$a = 1;
    switch ($a) {
        case 1:
            echo $a++ .", ";
        case 2:
            echo $a++ .", ";
        case 3:
            echo $a++.", ";
        case 4:
            echo $a++.", ";
        case 5:
            echo $a++.", ";
        case 6:
            echo $a++.", ";
        case 7:
            echo $a++.", ";
        case 8:
            echo $a++.", ";
        case 9:
            echo $a++.", ";
        case 10:
            echo $a++.", ";
        case 11:
            echo $a++.", ";
        case 12:
            echo $a++.", ";
        case 13:
            echo $a++.", ";
        case 14:
            echo $a++.", ";
        case 15:
            echo $a++.".<br>";
    }

    $arr = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
    function test_print($item){
    	echo $item." ";
    }
    array_walk_recursive($arr, 'test_print');
?>