<?php
/**
 * Created by andrii
 * Date: 06.05.19
 * Time: 18:04
 */

namespace app;

class Config
{
    private $config;
    private static $_instance;

    public function __construct(){
        $this->loadConfig();
    }

    public function __clone(){
        return self::getInstance();
    }

    public static function getInstance(){
        if (self::$_instance == null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    private function loadConfig(){
        $this->config['app'] = include ROOT . DS . 'config' . DS . 'app.php';
        $this->config['web'] = include ROOT . DS . 'config' . DS . 'web.php';
    }

    public function getAppConfig(){

        return $this->config['app'];
    }

    public function getWebConfig(){

        return $this->config['web'];
    }
}