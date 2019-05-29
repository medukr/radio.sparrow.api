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
        if (isset($this->params['id'])) {
            $categories = $this->getModel();

            $categoryId = $this->validateInt($this->params['id']);

            $page = isset($this->params['page'])
                ? $this->validateInt($this->params['page'])
                : 1;
            $per_page = isset($this->params['per_page'])
                ? $this->validateInt($this->params['per_page'])
                : 20;


            if (!!$categoryId || !!$page || !!$per_page) {
                echo $categories->getCategoryStations($categoryId, $page, $per_page);
            } else {
                throw new HttpSparrowException('Invalid parameter', 404);
            }


        } else {
            throw new HttpSparrowException('Missing id parameter', 404);
        }

    }


}