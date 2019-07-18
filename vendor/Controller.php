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
    protected $view;
    protected $layout;
    protected $layout_name;

    public function __construct()
    {
        $this->params = App::$app->getRouter()->getParams();
        $this->controller = 'controller'
            . '\\'
            . ucfirst(App::$app->getRouter()->getController())
            . 'Controller';

        $this->action =  App::$app->getRouter()->getAction()
            . 'Action';

        $this->view = static::getViewModel();

        $this->layout = false;
        $this->layout_name = 'main';
    }

    public function render(string $view, array $params = [])
    {

        $this->view->setLayout($this->layout);
        $this->view->setLayoutName($this->layout_name);

        $this->view->render($view, $params);
    }

    public function getController()
    {
        return $this->controller;
    }


    public function getAction()
    {
        return $this->action;
    }

    private static function getViewModel(){

        $path_name = strtolower(substr(substr(static::class, 11), 0, -10));

        return new View($path_name);
    }

}