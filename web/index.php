<?php
try{
    require_once '../vendor/lib/init.php';

    App::init();



} catch (Exception $e){
    echo '<b>Exception Message: </b>' . $e->getMessage() .PHP_EOL;
    echo '____in file: <b>' . $e->getFile() . '</b>(line: <b>'. $e->getLine() . '</b>)' . PHP_EOL;
    echo '<br>Trace: <b>' . $e->getTraceAsString(). '</b>' . PHP_EOL;
}

