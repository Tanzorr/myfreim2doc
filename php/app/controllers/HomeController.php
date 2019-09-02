<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 24.07.19
 * Time: 16:39
 */

class HomeController extends Controller
{
        public function __construct($controller, $action)
        {
            parent::__construct($controller, $action);
        }

        public function indexAction(){


            $this->view->render('home/index');
        }

}