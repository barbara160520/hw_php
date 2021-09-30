<?php
define('ROOT', dirname(__DIR__));
define('TEMPLATES_DIR', ROOT . '/templates/');
define('LAYOUTS_DIR', 'layouts/');



/* DB config */
define('HOST', 'localhost:3360');
define('USER', 'test');
define('PASS', '12345');
define('DB', 'gallery');

//TODO попробуйте сделать эти пути абсолютными
include ROOT . "/engine/functions.php";
include ROOT . "/engine/db.php";
include ROOT . "/engine/getImage.php";

