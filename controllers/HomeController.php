<?php
/**
 * Created by andrii
 * Date: 08.05.19
 * Time: 16:23
 */

namespace controller;


use app\Controller;

class HomeController extends Controller
{
    public function indexAction(){
       echo __METHOD__;
    }
}