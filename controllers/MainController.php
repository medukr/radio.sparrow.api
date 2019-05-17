<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:35
 */

namespace controller;


use app\App;
use app\Controller;

class MainController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->validateToken() === false){
            die('error token');
        }
    }

    public function validateToken()
    {
        return (
            isset($this->params['token'])
            &&
            $this->params['token'] === App::$app->getConfig()->getWebConfig()['token']
        );

    }
}