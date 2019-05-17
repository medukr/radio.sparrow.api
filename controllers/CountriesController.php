<?php
/**
 * Created by andrii
 * Date: 17.05.19
 * Time: 10:15
 */

namespace controller;



use model\CountriesModel;

class CountriesController extends MainController
{

    public function indexAction(){
        $countries = $this->getModel();

        echo $countries->getCountries(1,20);
    }

    public function getModel(){
        return new CountriesModel();

    }
}