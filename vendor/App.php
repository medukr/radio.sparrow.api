<?php
/**
 * Created by andrii
 * Date: 06.05.19
 * Time: 17:03
 */

namespace app;

use app\exception\AppSparrowException;
use app\exception\HttpSparrowException;
use app\exception\SparrowException;
use function PHPSTORM_META\map;

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

        $controller_class = 'controller'
            . '\\'
            . ucfirst(App::$app->getRouter()->getController())
            . 'Controller';

        $action = App::$app->getRouter()->getAction() . 'Action';

        self::$app->controller = new $controller_class;

        if (self::$app->controller instanceof Controller) {
            if (method_exists(self::$app->controller, $action)) {

                $params = self::$app->router->getParams('get');
                $requiredParams = $this->getRequiredMethodParameters($controller_class, $action);
                $filteredParams = $this->filterRequiredParams($requiredParams, $params);

                if (count($requiredParams) === count($filteredParams['true'])){

                    $arr = array_map(function ($item) use ($filteredParams){
                        return $filteredParams['true'][$item];
                    }, $requiredParams);

                    View::obStart();

                    self::$app->controller->$action(...$arr);
//                    die;
                } else {
                    throw new HttpSparrowException('Invalid \''. join('\', \'', $filteredParams['false']).'\' parameter(s)', 404);
                }
            }else {
                throw new AppSparrowException('Method ' . $controller_class .'\\' . $action . '()' . ' is Not Found',404);
            }
        } else {
            throw new AppSparrowException('Controller ' . $controller_class . ' is not instanceof app\\Controller' ,404);
        }

//        throw new AppSparrowException('Controller ' . $controller_class . ' is Not Found',404);

    }

    public function getRequiredMethodParameters($class, $method)
    {
        return array_map(function ($item) {
            return $item->name;
        }, (new \ReflectionMethod($class, $method))->getParameters());
    }


    public function filterRequiredParams($requiredParams, $params)
    {

        $filteredParams['true'] = [];
        $filteredParams['false'] = [];

        foreach ($requiredParams as $item) {
            array_key_exists($item, $params)
                ? $filteredParams['true'][$item] = $params[$item]
                : $filteredParams['false'][$item] = $item;
        }

        return $filteredParams;
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