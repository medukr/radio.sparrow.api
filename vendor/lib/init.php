<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 02.05.18
 * Time: 14:47
 */

include 'functions.php';

const DS = DIRECTORY_SEPARATOR;
define('ROOT', dirname(__FILE__, 3));

//require_once(ROOT . DS . 'config' . DS . 'config.php');

spl_autoload_register(function ($class_name){
    $pars_class_name = explode('\\', $class_name);

    $file_path = ROOT . DS;

    for ($i = 0; $i < count($pars_class_name); $i++){
        $file_path .= $pars_class_name[$i];

        if ($i < count($pars_class_name) - 1) {
            $file_path .= DS;
        }
    }

    $file_path .= '.php';

    if (file_exists($file_path)) {
        require_once($file_path);
    } else {
        throw new Exception('Failed to included class:' . $class_name . ' in: ' . $file_path);
    }
});

