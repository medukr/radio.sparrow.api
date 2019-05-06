<?php
/**
 * Created by andrii
 * Date: 06.05.19
 * Time: 17:03
 */
namespace vendor;

class App
{
    private $router;


    public function __construct()
    {

    }

    static function run($uri)
    {
        self::$router = new Router($uri);
    }
}