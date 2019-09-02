<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 24.07.19
 * Time: 15:49
 */



class Controller extends Application {
    protected $_controller,$_action;
    public $view;

    public  function __construct($controller,$action)
    {
        parent::__construct();
        $this->_controller = $controller;
        $this->_action = $action;
        $this->view = new View();
    }

    protected function load_model($model){
        if (class_exists($model)){
            $this->{$model.'Model'} =  new $model(strtolower($model));
        }
    }

//    protected function load_model($model) {
//        $modelPath = 'App\Models\\' . $model;
//        if(class_exists($modelPath)) {
//            $this->{$model.'Model'} = new $modelPath();
//        }
//    }

}