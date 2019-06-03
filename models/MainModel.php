<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 14:26
 */

namespace model;


use app\App;
use app\Model;
use function PHPSTORM_META\type;

class MainModel extends Model
{
    protected $storagePath;

    const STORAGE_PATH = '/db/storage';

    const ALL_COUNTRIES = 'countries.txt';

    const ALL_CATEGORIES = 'all_categories.txt';
    const PRIMARY_CATEGORIES = 'primary_categories.txt';

    const ALL_STATIONS = 'stations.txt';
    const RECENT_STATIONS = 'recent.txt';
    const POPULAR_STATIONS = 'popular.txt';
    const SIMILAR_STATIONS = 'similar_stations.txt';

    const SONG_HISTORY = 'song_history.txt';

    const POP_STATIONS = 'pop_stations.txt';
    const SPEECH_STATIONS = 'speech_stations.txt';
    const DANCE_STATIONS = 'dance_stations.txt';
    const ELECTRONIC_STATIONS = 'electronic_stations.txt';
    const DECADES_STATIONS = 'decades_stations.txt';

    public function __construct()
    {
        parent::__construct();
        $this->storagePath = App::$app->getRouter()->getRootDir() . self::STORAGE_PATH;
    }

    public function apiKey()
    {
        return App::$app->getConfig()->getWebConfig()['api_key'];
    }

    public function apiServer()
    {
        return App::$app->getConfig()->getWebConfig()['api_server'];
    }

    public function validateString(String $string)
    {
        return htmlentities(trim($string), ENT_QUOTES, 'utf-8', false);
    }

    protected function pagination($page, $per_page){

        $request = ['page' => $page, 'per_page' => $per_page]; //page=1&per_page=20

        return http_build_query($request);
    }
}