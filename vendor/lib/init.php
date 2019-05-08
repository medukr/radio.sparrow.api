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


spl_autoload_register(/**
 * @param $class_name
 */ function ($class_name) {

    $app_config = require ROOT . DS . 'config' . DS . 'app.php';

    $pars_class_name = explode('\\', $class_name);

    //путь к папке root
    $file_path = ROOT . DS;

    //controller\TestController => controllers/TestController
    //\App => vendor/App

    //определяем имя класса
    $className = end($pars_class_name);

    //удаляем имя класса из разпарсеного массива
    array_pop($pars_class_name);

    //устанавливаем директорию по умолчанию
    $namespacePath = 'vendor';

    //если в массиве что-то осталось, то проверяем 0-й елемент на совпадение с задекларированным в конфиге
    if (!empty($pars_class_name)){
        if (isset($app_config['namespaces_path'][$pars_class_name[0]])){
            //если есть совпадение, то меняем директорию
            $namespacePath = $app_config['namespaces_path'][$pars_class_name[0]];
            //удаляем из разпарсенного массива корневой неймспейс
            array_shift($pars_class_name);
        }
    }


    //добавляем к пути директорию, которая получилась
    $file_path .= $namespacePath . DS;

    //из оставшегося в массиве добавляем в путь
    for ($i = 0; $i < count($pars_class_name); $i++) {
        $file_path .= $pars_class_name[$i] . DS;
    }

    //добавляем к пути имя класса
    $file_path .= $className . '.php';

    if (file_exists($file_path)) {
        require_once($file_path);
    } else {
        throw new Exception('Failed to included class:' . $class_name . ' in: ' . $file_path);
    }
});

