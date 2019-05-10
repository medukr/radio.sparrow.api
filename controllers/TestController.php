<?php
/**
 * Created by andrii
 * Date: 08.05.19
 * Time: 11:37
 */

namespace controller;

use app\App;
use app\Controller;

class TestController extends Controller
{
    public function testAction(){

        $this->render(__METHOD__, $this->params);
    }

    public function indexAction(){
        echo __METHOD__;
    }
}