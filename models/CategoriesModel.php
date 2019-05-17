<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:11
 */

namespace model;



class CategoriesModel extends MainModel
{

    private $_base = 'categories';

    public function getAll(){
        return file_get_contents($this->storagePath. '/' .'all_categories.txt');
    }


    public function getPrimary(){
        return file_get_contents($this->storagePath. '/' .'primary_categories.txt');
    }

    public function getCategoryStations($id){

        switch ($id) {
            case 5: $fileName = 'pop_stations.txt';
            break;
            case 4: $fileName = 'speech_stations.txt';
            break;
            case 3: $fileName = 'dance_stations.txt';
            break;
            case 14: $fileName = 'electronic_stations.txt';
            break;
            case 40: $fileName = 'decades_stations.txt';
            break;
            default: $fileName = false;
        }


        if ($fileName !== false) {

            return file_get_contents($this->storagePath. '/' . $fileName);

        } else {

            $data = file_get_contents($this->storagePath. '/' . 'recent.txt');

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