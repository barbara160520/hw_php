<?php
$messages = [
    'ok' => 'Файл загружен.',
    'error_1' => 'Ошибка загрузки, попробуйте еще раз',
    'error_2' => 'Размер файла не должен превышать 5 Мб'
];

$images = array_splice(scandir(IMG_NEW),2);
$gallery = array_splice(scandir(IMG_SMALL),2);

if (!empty($_FILES)) {
    $extension = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
    $apend = "img_" . rand(15,100) . ".{$extension}";
    $path = IMG_NEW . $apend;
    
    if(($_FILES['myfile']['type'] == 'image/gif' 
    || $_FILES['myfile']['type'] == 'image/jpeg' 
    || $_FILES['myfile']['type'] == 'image/png') 
    && ($_FILES['myfile']['size'] != 0 and $_FILES['myfile']['size']<=1024*1*1024)) 
    { 
		if (move_uploaded_file($_FILES['myfile']['tmp_name'], $path)) {
			$message = "ok";
		} else {
			$message =  "error_1";
			unlink($path); // удаление файла 
		}
	} else { 
        $message = "error_2";
    } 
    header("Location: index.php?status=" . $message);
    die();

}
$message = $messages[$_GET['status']];