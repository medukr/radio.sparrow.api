<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:11
 */

namespace model;


use app\App;
use app\Model;

class CountriesModel extends MainModel
{
    private $_base = 'countries';

    public function getCountries($page, $per_page){
        return file_get_contents($this->storagePath. '/' .'countries.txt');
    }
}