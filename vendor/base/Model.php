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

    const SERVICE_FILE_PATH = '/db/service.ini';

    public function __construct()
    {
        $this->service = parse_ini_file(App::$app->getRouter()->getRootDir() . self::SERVICE_FILE_PATH, true);
    }

    abstract function apiKey();

    abstract function apiServer();

    public function getResponse($request){

        $path = $this->apiServer() . '/' .  $request  . '&' . $this->getToken();

        $curl = curl_init($path);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);

        return curl_exec($curl);

    }



    protected function getToken(){

        return  http_build_query(['token' => $this->apiKey()]); // token={your token}
    }

}