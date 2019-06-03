<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:11
 */

namespace model;

//API http://api.dirble.com/v2 не отвечает, этот класс нужно будет доработать, как только API заработает
class CategoriesModel extends MainModel
{

    private $_base = 'categories';

    public function getAll()
    {
        return file_get_contents($this->storagePath. DIRECTORY_SEPARATOR . self::ALL_CATEGORIES);
    }


    public function getPrimary()
    {
        return file_get_contents($this->storagePath. DIRECTORY_SEPARATOR . self::PRIMARY_CATEGORIES);
    }

    public function getCategoryStations($id, $page = 1, $per_page = 20)
    {
        switch ($id) {
            case 5: $fileName = self::POP_STATIONS;
            break;
            case 4: $fileName = self::SPEECH_STATIONS;
            break;
            case 3: $fileName = self::DANCE_STATIONS;
            break;
            case 14: $fileName = self::ELECTRONIC_STATIONS;
            break;
            case 40: $fileName = self::DECADES_STATIONS;
            break;
            default: $fileName = false;
        }

        if ($fileName !== false) {

            $content = json_decode(file_get_contents($this->storagePath. DIRECTORY_SEPARATOR . $fileName));

            $data = array_slice($content, 0, $per_page);

            return json_encode($data);

        } else {

            $data = file_get_contents($this->storagePath. DIRECTORY_SEPARATOR . self::RECENT_STATIONS);

            $arr_data = json_decode($data);


            $res = array_filter($arr_data,
                function ($el) use ($id){
                    return $el->categories[0]->id == $id;
                },ARRAY_FILTER_USE_BOTH);

            $res = array_values($res);

            return json_encode($res);
        }

    }

}