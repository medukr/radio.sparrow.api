<?php
/**
 * Created by andrii
 * Date: 08.05.19
 * Time: 16:44
 */

namespace app\exception;
use app\App;
use Throwable;

abstract class SparrowException extends \Exception
{
    private $log_dir_name = 'logs';

    abstract public function pushException();

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->logFile();

    }

    public function logFile(){

        $log_file_name = 'log1.log';

//        $scanDir = scandir($this->getLogDir());
//
//        foreach ($scanDir as $key => $value){
//            if (!is_file($this->getLogDir() . DS . $value)) unset($scanDir[$key]);
//        }
//
//        rsort($scanDir);

        file_put_contents($this->getLogDir() . $log_file_name,  $this->getLogMessage() .PHP_EOL.PHP_EOL.PHP_EOL, FILE_APPEND);
    }

    public function getLogDir()
    {
        return App::$app->getRouter()->getRootDir() . DIRECTORY_SEPARATOR . $this->log_dir_name . DIRECTORY_SEPARATOR;
    }

    public function getLogMessage(){
        $log = '[' . date('Y-m-d H:i:s') . '] ' . PHP_EOL;
        $log .= 'Exception Message: ' . $this->getMessage() . PHP_EOL;
        $log .= 'In File: ' . $this->getFile() . '(line: '. $this->getLine() . ')' . PHP_EOL;
        $log .= 'Trace: ' .PHP_EOL. $this->getTraceAsString();

        return $log;
    }

    public function pushResponseMessage($message = null){
        switch ($this->code) {
            case 404: ($message) ? $this->getNotFound($message) : $this->getNotFound();
            break;
            case 405: ($message) ? $this->getNotPermission($message) : $this->getNotPermission();
            break;
            default : ($message) ? $this->getNotFound($message) : $this->getNotFound();
        }
    }

    public function getNotFound($message = 'Not Found'){
        header('HTTP/1.0 404 Not Found');
        echo $message;
    }

    private function getNotPermission($message = 'Not Permission')
    {
        header('HTTP/1.0 405 Not Permission');
        echo $message;
    }


}