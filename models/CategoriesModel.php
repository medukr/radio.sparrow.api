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


        $data = file_get_contents($this->storagePath. '/' . 'recent.txt');

        $arr_data = json_decode($data);


        $res = array_filter($arr_data,
            function ($el, $key) use ($id){
            return $el->categories[0]->id == $id;
        },ARRAY_FILTER_USE_BOTH);

        $res = array_values($res);


        return json_encode($res);
    }

}