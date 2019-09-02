<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 21.08.19
 * Time: 13:22
 */

class ContactsController extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->view->setLayout('default');
        $this->load_model('Contacts');
    }

    public function indexAction(){
        $contacts= $this->ContactsModel->findByUserId(currentUser()->id,['order'=>'lname, fname']);

        $this->view->contacts = $contacts;

        $this->view->render('contacts/index');
    }
}