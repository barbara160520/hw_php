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
include ROOT . "/engine/functions.php";
include ROOT . "/engine/db.php";
include ROOT . "/engine/news.php";
include ROOT . "/engine/catalog.php";
include ROOT . "/engine/log.php";
include ROOT . "/engine/files.php";

/*Gallery*/
define("IMG_BIG", $_SERVER['DOCUMENT_ROOT'] . "/gallery_img/big/");
define("IMG_SMALL", $_SERVER['DOCUMENT_ROOT'] . "/gallery_img/small/");

include ROOT . "/engine/gallery.php";