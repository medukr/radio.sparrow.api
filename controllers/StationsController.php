<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:03
 */

namespace controller;


use model\StationsModel;

class StationsController extends MainController
{
    private $base = 'stations';


    //Загрузка популярных станций
    public function popularAction(){
        $model = $this->getModel();

        $page = $this->params['page'];
        $per_page = $this->params['per_page'];

        echo $model->loadPopular($page, $per_page);
    }

    //Загрузка всех странций
    public function indexAction(){
        $model  = $this->getModel();

        $page = $this->params['page'];
        $per_page = $this->params['per_page'];

        echo $model->loadStations($page, $per_page);
    }

    public function getModel(){
        return new StationsModel();
    }
}