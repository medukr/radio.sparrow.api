<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:14
 */

namespace controller;


use model\CategoriesModel;

class CategoriesController extends MainController
{

    public function indexAction(){
        $categories = $this->getModel();

        echo $categories->getAll();
    }


    public function primaryAction(){
        $categories = $this->getModel();

        echo $categories->getPrimary();
    }

    public function getModel(){
        return new CategoriesModel();
    }

    public function stationsAction(){
        $categories = $this->getModel();

        $categoryId = $this->params['id'];

        echo $categories->getCategoryStations($categoryId);
    }


}