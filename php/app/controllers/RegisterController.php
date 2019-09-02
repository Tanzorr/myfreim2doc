<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 03.08.2019
 * Time: 13:23
 */

class RegisterController extends Controller
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('User');
        $this->view->setLayout('default');
    }

    public function indexAction(){
        $this->view->render('register/login');
    }

    public function loginAction(){
        $validation = new  Validate();
        if ($_POST){
            //form validation
             $validation->check($_POST,[
                 'username'=>[
                     'display'=>'Username',
                     'required'=>true,
                     'max'=>10,
                     'matches'

                 ],
                'password'=>[
                    'display'=>'Password',
                    'required'=>true,
                    'min'=>6,
                    'matches'
                   ]
             ]);
             if ($validation->passed()){
                  $user = $this->UserModel->findByUsername($_POST['username']);

                  if ($user && $_POST['password'] === $user->password ){
                      $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true :false;

                    $user->login($remember);
                    Router::redirect('/');
                }else{
                      $validation->addError("There is an arror wit your username or password.");
                  }
             }
        }

        $this->view->displayErrors =  $validation->displayErrors();
        $this->view->render('register/login');
    }

    public function logoutAction(){

        $user = currentUser();

        if ($user){
            $user->logout();
        }

        Router::redirect('login');
    }

    public function registerAction(){
            $validator =  new Validate();
            $posted_values = ['fname'=>'','lname'=>'','username'=>'','email'=>'','password'=>'','confirm'=>''];
            if ($_POST){
                $posted_values =posted_values($_POST);
                $validator->check($_POST,[
                    'fname'=>[
                        'display'=>'First name',
                        'required'=>true
                    ],
                    'lname'=>[
                        'display'=>'Last name',
                        'required'=>true
                    ],
                    'username'=>[
                        'display'=>'Username',
                        'required'=>true,
                        'unique'=>'users',
                        'min'=>6,
                        'max'=>150
                    ],
                    'email'=>[
                        'display'=>'Email',
                        'required'=>true,
                       'unique'=>'users',
                        'max'=>150,
                        'valid_email'=>true
                    ],
                    'password'=>[
                        'display'=>'Password',
                        'required'=>true,
                        'min'=>6
                    ],
                    'confirm'=>[
                        'display'=>'Confirm Password',
                        'required'=>true,
                        'matches'=>'password'
                    ],
                ]);

                if($validator->passed()){
                    $newUser =  new User();
                    $newUser->registerNewUser($_POST);
                    $newUser->login();
                    Router::redirect('register/login');
                }
            }
            $this->view->post = $posted_values;
            $this->view->displayErrors =  $validator->displayErrors();
            $this->view->render('register/register');
    }

}