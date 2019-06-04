<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:10
 */

namespace model;

use http\Exception\BadUrlException;

//API http://api.dirble.com/v2 не отвечает, этот класс нужно будет доработать, как только API заработает
class StationsModel extends MainModel
{
    private $_base = 'stations';

    public function getPopular($page, $per_page)
    {
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

//        if ((time() - fileatime($this->storagePath . DIRECTORY_SEPARATOR . self::POPULAR_STATIONS)) > (int)$this->service['stations']['timeOutTimer']) {
//
//            $request = $this->_base . '/popular?' . http_build_query(compact('page', 'per_page'));
//            $result = $this->getResponse($request);
//
//            file_put_contents($this->storagePath . DIRECTORY_SEPARATOR . self::POPULAR_STATIONS, $result);
//
//            return $result;
//        } else {

        return file_get_contents($this->storagePath . DIRECTORY_SEPARATOR . self::POPULAR_STATIONS);
//    }
    }

    public function getStations($page, $per_page){

//        $request = $this->_base . '?' . http_build_query(compact('page', 'per_page'));
//        $result = $this->getResponse($request);

        return file_get_contents($this->storagePath. DIRECTORY_SEPARATOR . self::ALL_STATIONS);

    }

    public function getSimilar($id, $page, $per_page){

//        if ((time() - fileatime($this->storagePath . DIRECTORY_SEPARATOR . self::SIMILAR_STATIONS)) > (int)$this->service['stations']['timeOutTimer']) {
//
//            $request = $this->_base . '/similar?' . http_build_query(compact('id', 'page', 'per_page'));
//            $result = $this->getResponse($request);
//
//            file_put_contents($this->storagePath . DIRECTORY_SEPARATOR . self::SIMILAR_STATIONS, $result);
//
//            return $result;
//        } else {

            return file_get_contents($this->storagePath . DIRECTORY_SEPARATOR . self::SIMILAR_STATIONS);

//        }

    }

    public function getRecent($page, $per_page = 20){

        $content = json_decode(file_get_contents($this->storagePath. DIRECTORY_SEPARATOR . self::RECENT_STATIONS));

        $data = array_slice($content, 0, $per_page);

        return json_encode($data);
    }

    public function getSpecific($id){
        //Это все дальше будет не актуально, когда api dirble.com снова заработет, нужн будет переписать

        $res = $this->getStationFromCache($id);

        $res = array_values($res);

        return isset($res[0]) ? json_encode($res[0]) : json_encode([]);
    }



    function getStationFromCache($id){

        $arr = [
            self::POPULAR_STATIONS,
            self::RECENT_STATIONS,
            self::SIMILAR_STATIONS,
            self::DECADES_STATIONS,
            self::SPEECH_STATIONS,
            self::POP_STATIONS,
            self::ELECTRONIC_STATIONS,
            self::DANCE_STATIONS
        ];

        $result = [];

        foreach ($arr as $item) {
            $res = $this->searchStationInCache($item, $id);
            if (!empty($res)) $result = $res;
        }

        return $result;

    }

    public function searchStationInCache($file_name, $id){

        $data = file_get_contents($this->storagePath. DIRECTORY_SEPARATOR . $file_name);

        $arr_data = json_decode($data);

        $res = array_filter($arr_data, function ($el, $key) use ($id){
            return $el->id == $id;
        },ARRAY_FILTER_USE_BOTH);

        return $res;
    }

    public function getSongHistory($id, $page, $per_page){
        $data = file_get_contents($this->storagePath. DIRECTORY_SEPARATOR . self::SONG_HISTORY);

        $data = json_decode($data);

        shuffle($data);

        return json_encode($data);
    }

    public function getSearch($query, $page, $per_page){

        $query = $this->validateString($query);

        if ($query) {
            //Сейчас просто заглушка
            $data =  file_get_contents($this->storagePath. DIRECTORY_SEPARATOR . self::POPULAR_STATIONS);

            $data = json_decode($data);

            shuffle($data);

            return  json_encode($data);
        }

        return [];
    }
}