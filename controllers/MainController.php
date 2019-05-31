<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:35
 */

namespace controller;


use app\App;
use app\exception\AppSparrowException;
use app\exception\HttpSparrowException;
use app\Controller;

class MainController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->validateToken();

    }


    //return true/false
    public function validateToken()
    {
        if (isset($this->params['get']['token']) && $this->params['get']['token'] === App::$app->getConfig()->getWebConfig()['token']) return true;
        else throw new HttpSparrowException('Error access token', 405);
    }

    public function validateData($string){

        return htmlentities(trim($string), ENT_QUOTES, 'utf-8', false);

    }

    public function validateInt($int){

        if (is_numeric($int)) return (int)$int;
        else throw new AppSparrowException('Parameter is not valid', 404);

    }
}