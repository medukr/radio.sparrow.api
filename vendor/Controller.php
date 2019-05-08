<?php
/**
 * Created by andrii
 * Date: 08.05.19
 * Time: 11:06
 */

namespace app;

class Controller
{
    protected $params;
    protected $controller;
    protected $action;

    public function __construct()
    {
        $this->params = App::$app->getRouter()->getParams();
        $this->controller = 'controller'
            . '\\'
            . ucfirst(App::$app->getRouter()->getController())
            . 'Controller';

        $this->action =  App::$app->getRouter()->getAction()
            . 'Action';

    }

    public function render($arg){
        echo $arg;
    }

    public function getController()
    {
        return $this->controller;
    }


    public function getAction()
    {
        return $this->action;
    }


}