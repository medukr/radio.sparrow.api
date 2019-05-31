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

        $page = isset($this->params['page'])
            ? $this->validateInt($this->params['page'])
            : 1;
        $per_page = isset($this->params['per_page'])
            ? $this->validateInt($this->params['per_page'])
            : 20;

        $result = $stations->getStations($page, $per_page);

        $this->render('main', compact('result'));
    }

    //Загрузка популярных станций
    public function popularAction(){
        $stations = $this->getModel();

        $page = isset($this->params['page'])
            ? $this->validateInt($this->params['page'])
            : 1;
        $per_page = isset($this->params['per_page'])
            ? $this->validateInt($this->params['per_page'])
            : 20;

        $result =  $stations->getPopular($page, $per_page);

        $this->render('main', compact('result'));
    }

    //Загрузка похожих станций
    public function similarAction($id){
        $stations = $this->getModel();

        $id = $this->validateInt($id);
        $page = isset($this->params['page'])
            ? $this->validateInt($this->params['page'])
            : 1;
        $per_page = isset($this->params['per_page'])
            ? $this->validateInt($this->params['per_page'])
            : 20;

        $result =  $stations->getSimilar($id, $page, $per_page);

        $this->render('main', compact('result'));

    }

    //Загрузка последних добаленных станций
    public function recentAction(){

        $stations = $this->getModel();

        $page = isset($this->params['page'])
            ? $this->validateInt($this->params['page'])
            : 1;
        $per_page = isset($this->params['per_page'])
            ? $this->validateInt($this->params['per_page'])
            : 20;

        $result =  $stations->getRecent($page, $per_page);

        $this->render('main', compact('result'));

    }


    public function specificAction($id){
        $stations = $this->getModel();

        $id = $this->validateInt($id);

        $result = $stations->getSpecific($id);

        $this->render('main', compact('result'));

    }

    public function song_historyAction($id){
        $stations = $this->getModel();

        $id = $this->validateInt($id);
        $page = isset($this->params['page'])
            ? $this->validateInt($this->params['page'])
            : 1;
        $per_page = isset($this->params['per_page'])
            ? $this->validateInt($this->params['per_page'])
            : 20;

        $result = $stations->getSongHistory($id, $page, $per_page);

        $this->render('main', compact('result'));

    }

    public function searchAction($query){
        $stations = $this->getModel();

        $query = $this->validateData($query);
        $page = isset($this->params['page'])
            ? $this->validateInt($this->params['page'])
            : 1;
        $per_page = isset($this->params['per_page'])
            ? $this->validateInt($this->params['per_page'])
            : 20;

        $result = $stations->getSearch($query, $page, $per_page);

        $this->render('main', compact('result'));
    }

    public function getModel(){
        return new StationsModel();
    }
}