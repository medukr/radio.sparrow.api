<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 14:26
 */

namespace model;


use app\App;
use app\Model;

class MainModel extends Model
{
    protected $storagePath;

    public function __construct()
    {
        parent::__construct();

        $this->storagePath = App::$app->getRouter()->getRootDir() . '/db/storage';
    }


    public function apiKey(){
        return App::$app->getConfig()->getWebConfig()['api_key'];
    }

    public function apiServer(){
        return App::$app->getConfig()->getWebConfig()['api_server'];
    }
}