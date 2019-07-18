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

    //Этот метод вызвется по урл:
    //  '/'
    //  '/home'
    //  '/home/index'
    //такое поведение из-за установленных по-умолчанию контроллера и экшна
    public function indexAction(){
       $message =  'Hello, this is RadioSparrow API';

       $this->render('index', compact('message'));
    }

    //Этот метод вызвется только по урл '/home/countries'
    //по урл '/countries' произойдет попытка вызвать соответсвующий контроллер и установленный по-умолчанию экшн
    public function countriesAction(){
        $message =  'Hello, this is countriesAction()';

        $this->render('index', compact('message'));
    }
}