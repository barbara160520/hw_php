<?php
print "Задание №6<br>";

$result = $val = 2;
$pow = 1;
echo "Число - ${val}, степень - ${pow}<br>";

function power($val,$pow,&$result){
    if ($pow != 1)
    {
        $result *= $val;
        power($val, --$pow, $result);
        return $result;
    }
    return $val;
}

echo power($val, $pow, $result);