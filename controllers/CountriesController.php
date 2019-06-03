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

    public function __construct()
    {
        parent::__construct();

        $this->validateToken();

    }

    public function indexAction(){
        $countries = $this->getModel();

        $result =  $countries->getCountries(1,20);

        $this->render('main', compact('result'));
    }

    public function getModel(){
        return new CountriesModel();

    }
}