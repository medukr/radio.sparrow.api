<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 02.05.18
 * Time: 14:47
 */
try {

    define('ROOT', dirname(__FILE__, 4));
    define('DS', DIRECTORY_SEPARATOR);

    include 'functions.php';
    require_once ROOT . '/vendor/autoload.php';



} catch (\Exception $e){
    header('HTTP/1.0 ' . $e->getCode()  . ' ' . $e->getMessage());
    echo $e->getMessage();
}




