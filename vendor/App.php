<?php
/**
 * Created by andrii
 * Date: 06.05.19
 * Time: 17:03
 */

class App
{
    public static $app;
    private $router;
    private $config;

    public function __construct(){}
    public function __clone(){}

    static function init()
    {
        if (self::$app == null){

            self::$app = new self;

            self::$app->config = Config::getInstance();
            self::$app->router = new Router($_SERVER['REQUEST_URI']);

            self::$app->run();
        }
    }


    private function run(){
        $this->router->run();
    }

    public function getRouter(){
        return $this->router;
    }

    public function getConfig(){
        return $this->config;
    }







}