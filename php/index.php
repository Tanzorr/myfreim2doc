<?php
// Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();

define('DS',DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

$url = isset($_SERVER['REQUEST_URI']) ? explode('/', ltrim($_SERVER['REQUEST_URI'], '/')):[];
require_once (ROOT.DS.'core'.DS.'Autoload.php');
require_once (ROOT.DS.'config'.DS.'config.php');
require_once (ROOT.DS.'app'.DS.'lib'.DS.'helpers'.DS.'functions.php');


if(!Session::exist(CURRENT_USER_SESSION_NAME) && Cookie::exists(REMEMBER_ME_COOKIE_NAME)){
    User::loginUserFromCooke();
}



Router::route($url);


