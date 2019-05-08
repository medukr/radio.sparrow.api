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

    public function __construct()
    {
        $this->params = App::$app->getRouter()->getParams();
    }

    public function render($arg){
        echo $arg;
    }

    public function getParams(){
        return $this->params;
    }

}