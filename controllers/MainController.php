<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:35
 */

namespace controller;


use app\App;
use app\exception\HttpSparrowException;
use app\Controller;

class MainController extends Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->validateToken()) throw new HttpSparrowException('Error access token', 405);
    }


    //return true/false
    public function validateToken()
    {
        return (
            isset($this->params['token'])
            &&
            $this->params['token'] === App::$app->getConfig()->getWebConfig()['token']
        );

    }

    public function validateInt($int){

        $number = (int) htmlentities(trim($int), ENT_QUOTES, 'utf-8', false);

        debug($int, 1);
        debug((string)$number, 1);
        debug($int == $number, 1);

        if ($number === $int) return $number;
        return false;
    }
}