<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 12.08.19
 * Time: 12:25
 */

class UserSessions extends Model
{
    public  function __construct($table)
    {
        $table = 'user_sessions';
        parent::__construct($table);
    }


    public static function getFromCooke(){
        if(Cookie::exists(REMEMBER_ME_COOKIE_NAME)){
            $userSesion = new self();
            $userSesion  = $userSesion->findFirst([
                'conditions'=>"user_agent =? AND session = ?",
                'build'=>[Session::uagent_no_version(), Cookie::get(REMEMBER_ME_COOKIE_NAME)]
                ]);
        }


        if (!isset($userSesion)){
            return false;
        }else{
            return  $userSesion;
        }
        }



}