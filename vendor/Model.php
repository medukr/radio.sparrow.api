<?php
/**
 * Created by andrii
 * Date: 16.05.19
 * Time: 15:18
 */

namespace app;


abstract class Model
{

    protected $service;

    public function __construct()
    {
        $this->service = parse_ini_file(App::$app->getRouter()->getRootDir() . '/db/service.ini', true);
    }

    abstract function apiKey();

    abstract function apiServer();

    public function getResponse($request, $page, $per_page){

        $path = $this->apiServer() . '/' .  $request . '?' . $this->paginations($page, $per_page) . '&' . $this->getToken();

        return $path;
    }

    protected function paginations($page, $per_page){

        $fromPage = 'page=' . $page;
        $toPage = 'per_page=' . $per_page;

        return $fromPage . '&' . $toPage; //page=1&per_page=10
    }

    protected function getToken(){
        return 'token=' . $this->apiKey(); // token={your token}
    }

}