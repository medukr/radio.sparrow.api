<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:11
 */

namespace model;


use app\App;
use app\Model;

class CategoriesModel extends Model
{

    private $_base = 'categories';


    public function apiKey(){
        return App::$app->getConfig()->getWebConfig()['api_key'];
    }

    public function apiServer(){
        return App::$app->getConfig()->getWebConfig()['api_server'];
    }
}