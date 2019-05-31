<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:14
 */

namespace controller;

use app\exception\HttpSparrowException;
use model\CategoriesModel;

class CategoriesController extends MainController
{
    public function getModel(){
        return new CategoriesModel();
    }

    public function indexAction(){

        $categories = $this->getModel();

        $result = $categories->getAll();

        $this->render('main', compact('result'));
    }

    public function primaryAction(){

        $categories = $this->getModel();

        $result = $categories->getPrimary();

        $this->render('main', compact('result'));
    }


    public function stationsAction($id){

        $categories = $this->getModel();

        $categoryId = $this->validateInt($id);

        $page = isset($this->params['page'])
            ? $this->validateInt($this->params['page'])
            : 1;
        $per_page = isset($this->params['per_page'])
            ? $this->validateInt($this->params['per_page'])
            : 20;

        $result = $categories->getCategoryStations($categoryId, $page, $per_page);

        $this->render('main', ['result' => $result]);

    }


}