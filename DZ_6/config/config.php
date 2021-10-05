<?php
define('ROOT', dirname(__DIR__));
define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB config */
define('HOST', 'localhost:3360');
define('USER', 'test');
define('PASS', '12345');
define('DB', 'gb1');

//TODO попробуйте сделать эти пути абсолютными
include ROOT . "/engine/redner.php";
include ROOT . "/engine/db.php";
include ROOT . "/engine/controller.php";
include ROOT . "/models/feedback.php";
include ROOT . "/models/news.php";
include ROOT . "/models/catalog.php";
include ROOT . "/models/log.php";
include ROOT . "/models/files.php";
include ROOT . "/models/getMenu.php";

/*Gallery*/
define("IMG_BIG", $_SERVER['DOCUMENT_ROOT'] . "/gallery_img/big/");
define("IMG_SMALL", $_SERVER['DOCUMENT_ROOT'] . "/gallery_img/small/");

include ROOT . "/models/getImage.php";