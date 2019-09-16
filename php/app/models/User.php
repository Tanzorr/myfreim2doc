<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 03.08.2019
 * Time: 22:05
 */

class User extends Model
{
    private $_isLoggedIn, $_sessionName, $_cookieName, $_confirm;
    public static $currentLoggedInUser = null;
    public $id,$username,$email,$password,$fname,$lname,$acl,$deleted = 0;

    public function __construct($user='') {
        $table = 'users';
        parent::__construct($table);
        $this->_sessionName = CURRENT_USER_SESSION_NAME;
        $this->_cookieName = REMEMBER_ME_COOKIE_NAME;
        $this->_softDelete = true;
        $this->_modelName = 'User';
        if($user != '') {
            if(is_int($user)) {
                $u = $this->_db->findFirst('users',['conditions'=>'id = ?', 'bind'=>[$user]],'User');
            } else {
                $u = $this->_db->findFirst('users', ['conditions'=>'username = ?','bind'=>[$user]],'User');
            }
            if($u) {
                foreach($u as $key => $val) {
                    $this->$key = $val;
                }
            }
        }
    }
        public function  findByUsername($username){
            return $this->findFirst(['conditions'=>"username = ?", 'bind'=>[$username]]);
            }

         public  static  function currentLoggedUser(){
                if (!isset(self::$currentLoggedInUser) && Session::exist(CURRENT_USER_SESSION_NAME) ){
                        $u = new User((int) Session::get(CURRENT_USER_SESSION_NAME));
                        self::$currentLoggedInUser =$u;
                }
                return self::$currentLoggedInUser;
         }

        public function login($rememberMe=false) {
            Session::set($this->_sessionName, $this->id);
            if($rememberMe) {
                $hash = md5(uniqid() + rand(0, 100));
                $user_agent = Session::uagent_no_version();
                Cookie::set($this->_cookieName, $hash, REMEMBER_ME_COOKIE_EXPIRY);
                $fields = ['session'=>$hash, 'user_agent'=>$user_agent, 'user_id'=>$this->id];
                $this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
                $this->_db->insert('user_sessions', $fields);
            }
        }

        public static function loginUserFromCooke(){
            $user_session = UserSessions::getFromCooke();
            did($user_session);

            if ($user_session->user_id !=''){
                $user = new self((int)$user_session->user_id);
            }

            if($user){
                $user->login();
            }

            return self::$currentLoggedInUser;
        }

        public function logout(){
        $userSession = UserSessions::getFromCooke();
        if($userSession){
            $userSession->delete();
        }
        Session::delete(CURRENT_USER_SESSION_NAME);
            if(Cookie::exists(REMEMBER_ME_COOKIE_NAME)){
                Cookie::delete(REMEMBER_ME_COOKIE_NAME);
            }
            self::$currentLoggedInUser = null;
            return true;
        }

        public  function registerNewUser($params){
                $this->assign($params);
                $this->deleted =0;
                $this->password  = password_hash($this->password, PASSWORD_DEFAULT);

                $this->save();
        }

        public function acls(){
            if(empty($this->acl)){
                return [];
            } else{

                return json_decode($this->acl, true);
            }

        }


}