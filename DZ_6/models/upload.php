<?php
//$db = getDb();
$masseges = [
    'ok' => 'Файл загружен.',
    'error_1' => 'Ошибка загрузки, попробуйте еще раз',
    'error_2' => 'Неверный формат или размер файла не должен превышать 5 Мб'
];

include "classSimpleImage.php";

if (!empty($_FILES)) {
    $extension = pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION);
    $apend = "img_" . rand(15,100) . ".{$extension}";
    $path_big = IMG_BIG . $apend;
    $path_small = IMG_SMALL . $apend;

    if(($_FILES['myfile']['type'] == 'image/gif'
    || $_FILES['myfile']['type'] == 'image/jpeg'
    || $_FILES['myfile']['type'] == 'image/png')
    && ($_FILES['myfile']['size'] != 0 and $_FILES['myfile']['size']<=1024*1*1024))
    {
        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $path_big)) {

            //вставка данных в БД
            $name = mysqli_real_escape_string(getDb(),$apend);
            executeSql("INSERT INTO images(name) VALUES ('{$name}')");
          
            
            //ресайз картинок
            $image = new SimpleImage();
            $image->load($path_big);
            $image->resizeToWidth(150);
            $image->save($path_small);

            $massege =  "ok";
            header("Location: /gallery");
        } else {
            $massege =  "error_1";
        }
    } else {
        $massege = "error_2";
    }
}
$massege = $masseges[$_GET['status']];