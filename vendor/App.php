<?php
/**
 * Created by andrii
 * Date: 06.05.19
 * Time: 17:03
 */

namespace app;

use app\exception\AppSparrowException;
use app\exception\SparrowException;

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
        try {

            if (self::$app == null) {

                self::$app = new self;

                self::$app->config = Config::getInstance();
                self::$app->router = new Router($_SERVER['REQUEST_URI']);

                self::$app->run();
            }
        } catch (SparrowException $e) {
            $e->pushException();
        }
    }


    private function run()
    {
        $this->router->run();

//      self::$app->controller = new Controller();

        $controller_class = 'controller'
            . '\\'
            . ucfirst(App::$app->getRouter()->getController())
            . 'Controller';

        $action = App::$app->getRouter()->getAction() . 'Action';

        self::$app->controller = new $controller_class;

        if (self::$app->controller instanceof Controller) {
            if (method_exists(self::$app->controller, $action)) {
                self::$app->controller->$action();
                die;
            }else {
                throw new AppSparrowException('Method '
                    . $controller_class
                    .'\\'
                    .$action
                    .'()'
                    .' is Not Found',404);
            }
        } else {
            throw new AppSparrowException('The controller is not instanceof app\\Controller' ,404);
        }

        throw new AppSparrowException('The controller is Not Found',404);

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