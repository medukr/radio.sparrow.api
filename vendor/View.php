<?php
/**
 * Created by andrii
 * Date: 30.05.19
 * Time: 10:42
 */

namespace app;


use app\exception\AppSparrowException;
use app\exception\DevSparrowException;
use app\exception\HttpSparrowException;

class View
{
    protected $controller_views_path_name;
    protected $views_path;
    protected $layout;
    protected $layout_path;
    protected $layout_name;

    public function __construct(string $path_name)
    {
        ob_start();

        $this->views_path = App::$app->getRouter()->getRootDir() . DIRECTORY_SEPARATOR . 'views';

        $this->controller_views_path_name = $path_name;

        $this->layout_path = $this->views_path . DIRECTORY_SEPARATOR . 'layouts';
        $this->layout = false;
        $this->layout_name = 'main';

    }


    public function getViewPath()
    {
        return $this->views_path;
    }

    public function getLayoutPath(){
        return $this->layout_path;
    }

    public function setLayout(bool $bool)
    {
        $this->layout = $bool;
    }

    public function setLayoutName(string $name)
    {
        $this->layout_name = $name;
    }

    public function render(string $view_file_name,array $params)
    {
        foreach ($params as $key => $param){
            $$key = $param;
        }

        $view_file = $this->views_path . DIRECTORY_SEPARATOR . $this->controller_views_path_name . DIRECTORY_SEPARATOR . $view_file_name . '.php';
        $layout_file = $this->layout_path . DIRECTORY_SEPARATOR . $this->layout_name . '.php';


        if (file_exists($view_file)) {
                   include ($view_file);
                   $content = ob_get_clean();
        } else {
            throw new DevSparrowException('View file not found in ' . $view_file, 404);
        }


        if ($this->layout) {
            if (file_exists($layout_file)){
                 include ($layout_file);
                 $content = ob_get_clean();
            } else {
                throw new DevSparrowException('Layout file not found in ' . $layout_file, 404);
            }
        }

        echo $content;
    }
}