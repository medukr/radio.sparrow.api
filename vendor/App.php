<?php
/**
 * Created by andrii
 * Date: 06.05.19
 * Time: 17:03
 */

namespace app;

class App
{
    public static $app;

    private $router;
    private $config;
    private $controller;

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

        $controller_class = 'controller'
            . '\\'
            . ucfirst($this->router->getController())
            . 'Controller';

        $controller_method =  $this->router->getAction()
            . 'Action';



        if (class_exists($controller_class)){
            $controller_object = new $controller_class;
            if (method_exists($controller_object, $controller_method)){
                $controller_object->$controller_method();
            }
        }






    }

    public function getRouter(){
        return $this->router;
    }

    public function getConfig(){
        return $this->config;
    }

    public function getController(){
        return $this->controller;
    }







}