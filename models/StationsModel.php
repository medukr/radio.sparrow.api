<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:10
 */

namespace model;


use app\App;
use app\Model;

class StationsModel extends Model
{
    private $_base = 'stations';

    public function apiKey(){
        return App::$app->getConfig()->getWebConfig()['api_key'];
    }

    public function apiServer(){
        return App::$app->getConfig()->getWebConfig()['api_server'];
    }

    public function loadPopular($page, $per_page){
        /*
        if ( разница во времени с последней загрузки больше установленной){
            // 1.загружай обновленную инфу
            // 2. сохраняй в файл
            // 3. верни инфу в контроллер для отправки польователю
        } else {
            // 1.Прочитай из файла инфу
            // 2. Верни в контроллер для отправки пользователю
        }
        */
        //Так вот а страницы как проверять?

        debug($this->service);

        $request = $this->_base .  '/popular';

        return $this->getResponse($request, $page, $per_page);
    }

    public function loadStations($page, $per_page){
        $request = $this->_base;
        return $this->getResponse($request, $page, $per_page);

    }
}