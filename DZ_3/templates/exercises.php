<p class="text" style='margin-left:50px'><?php
print("Задание №1<br>");
$n = 100;
$i = 0;
while($i <= $n){
	if ($i%3 == 0){
	echo "$i ";
	}
   $i++;
}
print("<br><br>Задание №2");
$a = 0;
$b  = 10;
do {
	switch ($a) {
	 	case 0:
	 		echo "<br>".$a." - ноль.";
	 		break;
	 	case $a%2 == 0:
	 		echo "<br>".$a." - четное число.";
	 		break;
		case $a%2 <> 0:
	 		echo "<br>".$a." - нечетное число.";
	 		break;
	}
	$a++;
} while ($a <= $b);
print("<br><br>Задание №3<br>");
$maps =[
	'Московская область' => [
		'Москва', 'Зеленоград', 'Клин'
	],
	'Ленинградская область' => [
		'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'
	],
	'Рязанская область' => [
		'Рязань', 'Скопин', 'Шилов'
	],
];
foreach ($maps as $my_key => $my_value)
{
   echo("$my_key: <br/>");
   foreach ($my_value as $value) {
	   	if ($value == end($my_value)){
	   		echo("$value.<br>");
	   	}
	   	else echo("$value, ");
   }
}
print("<br>Задание №4<br>");
function translate($str){
	$alphabet = [
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
	];

	$str = mb_strtolower($str);
	$str = strtr($str,$alphabet);
	#$str = first($str);
	$str = ucfirst($str);
	return $str;
}
echo translate("Добро пожаловать в зомбиленд!");

function first($str) {
	//работает только для заглавных букв в начале предложения
	$first_char = mb_substr($str, 0, 1, 'UTF-8');
	$first_upper = mb_strtoupper($first_char, 'UTF-8');
	$all_characters = mb_substr($str, 1, mb_strlen($str), 'UTF-8');
	$result = $first_upper . $all_characters;

	return $result;
}
print("<br><br>Задание №5<br>");
function replace_str($str){
	$str = str_replace(' ', '_', $str);
	return $str;
}
echo replace_str("Добро пожаловать в зомбиленд!");
print("<br><br>Задание №7<br>");
for ($i = 0; $i <= 9;print $i, $i++) {
	# если без 9 то $i < 9
}
print("<br><br>Задание №8<br>");
//Массив находиться выше в Задании №3
foreach ($maps as $my_key=>$my_value)
{
   echo("$my_key: <br/>");
   foreach ($my_value as $value) {
	   	if (mb_substr ($value, 0, 1) == "К"){
	   		echo("$value.<br>");
	   	}
	   	else echo(" ");
   }
}
print("<br>Задание №9<br>");
function full_translate($str){
	$alphabet = [
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
	];

	$str = mb_strtolower($str);
	$str = strtr($str,$alphabet);
	$str = ucfirst($str);
	#$str = first($str);		//см. выше в Задании №4
	$str = replace_str($str);	//см. выше в Задании №5
	return $str;
}
echo full_translate("Приходите в зомбиленд снова!!");?>
</p>