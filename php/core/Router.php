<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 23.07.19
 * Time: 16:19
 */

class Router
{

    public static function route($url) {

        //controller
        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]).'Controller' : DEFAULT_CONTROLLER;
        $controller_name = str_replace('Controller','',$controller);
        array_shift($url);

        //action
        $action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action': 'indexAction';
        $action_name = (isset($url[0]) && $url[0] != '')? $url[0] : 'index';
        array_shift($url);


        //params
        $queryParams = $url;
       // $controller =  $controller;
        $dispatch = new $controller($controller_name, $action);

        if(!method_exists($controller, $action)) {
            die('That method does not exist in the controller \"' . $controller_name . '\"');
        }

        //acl check
        $grantAccess = self::hasAccess($controller_name, $action_name);

        if (!$grantAccess) {
            $controller_name = $controller = ACCESS_RESTRICTED;
            $action = 'indexAction';
        }
        call_user_func_array([$dispatch, $action], $queryParams);
    }


    public static function redirect($location) {
        if(!headers_sent()) {
            header('Location: '.$location);
            exit();
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$location.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$location.'" />';
            echo '</noscript>';exit;
        }
    }

    public static function hasAccess($controller_name, $action_name='index'){
        $acl_file= file_get_contents(ROOT.DS.'app'.DS.'acl.json');
        $acl=json_decode($acl_file,true);
        $current_user_acls = ["Guest"];
        $grantAccess= false;

        if (Session::exist(CURRENT_USER_SESSION_NAME)){

            $current_user_acls[]="LoggedIn";
            foreach (currentUser()->acls() as $a){
                $current_user_acls[]=$a;

            }
        }

        foreach ($current_user_acls as $level){

            if(array_key_exists($level, $acl)&& array_key_exists($controller_name, $acl[$level])){
                if (in_array($action_name, $acl[$level][$controller_name]) || in_array("*",$acl[$level][$controller_name])){

                    $grantAccess = true;
                    break;
                }
            }
        }


        //check for denied

        foreach ($current_user_acls as $level){
            $dinied = $acl[$level]['denied'];


            if (!empty($dinied) && array_key_exists($controller_name, $dinied) && in_array($action_name, $dinied[$controller_name])){

                $grantAccess = false;
                break;
            }
        }


       return $grantAccess;

    }

    public static function getMenu($menu) {
        $menuAry  = [];
        $menuFile = file_get_contents(ROOT . DS . 'app' . DS . $menu . '.json');
        $acl = json_decode($menuFile, true);
        foreach($acl as $key => $val) {
            if(is_array($val)) {
                $sub = [];
                foreach($val as $k => $v) {
                    if($k == 'separator' && !empty($sub)) {
                        $sub[$k] = '';
                        continue;
                    }else if($finalVal = self::get_link($v)) {
                        $sub[$k] = $finalVal;
                    }
                }
                if(!empty($sub)) {
                    $menuAry[$key] = $sub;
                }
            } else {
                if($finalVal = self::get_link($val)) {
                    $menuAry[$key] = $finalVal;
                }
            }
        }
        return $menuAry;
    }
    public static function get_link($val){
        // check if external link
        if(preg_match('/https?:\/\//', $val) == 1){
            return $val;
        }else{
            $uAry = explode(DS,$val);
            $controller_name = ucwords($uAry[0]);
            $action_name = (isset($uAry[1]))?$uAry[1]:'';
            if(self::hasAccess($controller_name,$action_name)){
                return PROOT.$val;
            }
            return false;
        }

    }


}