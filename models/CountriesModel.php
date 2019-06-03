<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:11
 */

namespace model;

use app\App;
use app\Model;

//API http://api.dirble.com/v2 не отвечает, этот класс нужно будет доработать, как только API заработает
class CountriesModel extends MainModel
{
    private $_base = 'countries';

    public function getCountries($page, $per_page)
    {
        return file_get_contents($this->storagePath. DIRECTORY_SEPARATOR . self::ALL_COUNTRIES);
    }
}