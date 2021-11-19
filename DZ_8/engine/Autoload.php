<?php

namespace app\engine;
//поменять переменные
class Autoload
{


    public function loadClass($className)
    {

        $filename = str_replace(['app\\', '\\'], [ROOT . DS, DS], $className) . ".php";

        if (file_exists($filename)) {
            include $filename;
        }

    }
}