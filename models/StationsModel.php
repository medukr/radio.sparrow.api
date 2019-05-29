<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:10
 */

namespace model;



use http\Exception\BadUrlException;

class StationsModel extends MainModel
{
    private $_base = 'stations';

    public function getPopular($page, $per_page){
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

//        debug($this->service);
//
//        $request = $this->_base .  '/popular';
//
//        return $this->getResponse($request, $page, $per_page);

        return file_get_contents($this->storagePath. '/' .'popular.txt');
    }

    public function getStations($page, $per_page){
//        $request = $this->_base;
//        return $this->getResponse($request, $page, $per_page);
        return file_get_contents($this->storagePath. '/' .'stations.txt');

    }

    public function getSimilar($page, $per_page){
        return file_get_contents($this->storagePath. '/' .'similar_stations.txt');
    }

    public function getRecent($page, $per_page = 20){

        $content = json_decode(file_get_contents($this->storagePath. '/' .'recent.txt'));

        $data = array_slice($content, 0, $per_page);

        return json_encode($data);
    }

    public function getSpecific($id){

        $data = file_get_contents($this->storagePath. '/' . 'recent.txt');

        $arr_data = json_decode($data);
        $res = array_filter($arr_data, function ($el, $key) use ($id){
            return $el->id == $id;
        },ARRAY_FILTER_USE_BOTH);

        if (empty($res)){
            $data = file_get_contents($this->storagePath. '/' . 'popular.txt');
            $arr_data = json_decode($data);
            $res = array_filter($arr_data, function ($el, $key) use ($id){
                return $el->id == $id;
            },ARRAY_FILTER_USE_BOTH);
        }

        $res = array_values($res);

        return isset($res[0]) ? json_encode($res[0]) : json_encode(null);
    }

    public function getSongHistory($id){
        $data = file_get_contents($this->storagePath. '/' . 'song_history.txt');

        $data = json_decode($data);

        shuffle($data);

        return json_encode($data);
    }

    public function getSearch($query){

        $query = $this->validateString($query);

        if ($query) {
            //Сейчас просто заглушка
            $data =  file_get_contents($this->storagePath. '/' . 'popular.txt');

            $data = json_decode($data);

            shuffle($data);

            return  json_encode($data);
        }

        return [];
    }
}