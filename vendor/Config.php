<?php
/**
 * Created by andrii
 * Date: 06.05.19
 * Time: 18:04
 */

namespace vendor;


class Config
{
    private static $_config;
    private static $_instance;

    public function __construct(){}
    public function __clone(){}

    public static function getInstance(){
        if (self::$_instance == null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    private function loadConfig(){
        $this->config['app'] = include_once ROOT . DS . 'config' . DS . 'app.php';
        $this->config['web'] = include_once ROOT . DS . 'config' . DS . 'web.php';
    }

    public function getConfig(){

    }
}