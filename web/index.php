<?php
try{
    require_once '../vendor/lib/init.php';

    \vendor\App::run($_SERVER['REQUEST_URI']);

} catch (Exception $e){
    echo '<b>Exception Message: </b>' . $e->getMessage() .PHP_EOL;
    echo '____in file: <b>' . $e->getFile() . '</b>(line: <b>'. $e->getLine() . '</b>)' . PHP_EOL;
    echo '<br>Trace: <b>' . $e->getTraceAsString(). '</b>' . PHP_EOL;
}

