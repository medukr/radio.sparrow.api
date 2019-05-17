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

    //Загрузка всех странций
    public function indexAction(){
        $stations  = $this->getModel();

        $page = $this->params['page'];
        $per_page = $this->params['per_page'];

        echo $stations->getStations($page, $per_page);
    }

    //Загрузка популярных станций
    public function popularAction(){
        $stations = $this->getModel();

        $page = $this->params['page'];
        $per_page = $this->params['per_page'];

        echo $stations->getPopular($page, $per_page);
    }

    //Загрузка похожих станций
    public function similarAction(){
        $stations = $this->getModel();

        $id = $this->params['id'];
        $page = $this->params['page'];
        $per_page = $this->params['per_page'];

        echo $stations->getSimilar($page, $per_page);
    }

    //Загрузка последних добаленных станций
    public function recentAction(){
        $stations = $this->getModel();

        $page = $this->params['page'];
        $per_page = $this->params['per_page'];

        echo $stations->getRecent($page, $per_page);
    }


    public function specificAction(){
        $stations = $this->getModel();

        $station_id = $this->params['id'];

        echo $stations->getSpecific($station_id);
    }

    public function song_historyAction(){
        $stations = $this->getModel();

        $station_id = $this->params['id'];

        echo $stations->getSongHistory($station_id);
    }

    public function getModel(){
        return new StationsModel();
    }
}