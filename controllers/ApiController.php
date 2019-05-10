<?php
/**
 * Created by andrii
 * Date: 10.05.19
 * Time: 9:19
 */

namespace controller;


use app\Controller;

class ApiController extends Controller
{
    function getallcategoriesAction(){

        $this->render(__METHOD__, $this->params);
    }
}