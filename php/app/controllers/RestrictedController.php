<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 16.08.19
 * Time: 13:48
 */

class RestrictedController extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
    }

    public function indexAction(){

        $this->view->render('restricted/index');
    }

}