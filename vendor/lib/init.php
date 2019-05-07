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


spl_autoload_register(function ($class_name){
    $app_config = require ROOT . DS . 'config' . DS . 'app.php';

    $pars_class_name = explode('\\', $class_name);

//    $namespace_path = $app_config['namespaces_path']['vendor'];
//
//    if (count($pars_class_name) < 2){
//        $namespace_path = 'vendor';
//    }

    $file_path = ROOT . DS . 'vendor' . DS;


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

