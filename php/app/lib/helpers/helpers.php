<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 23.07.19
 * Time: 16:06
 */

function did($data){
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function sanitize($dirty){
    return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
}


function currentUser(){
    return User::currentLoggedUser();
}

function curentPage(){
    $curentPage =  $_SERVER['REQUEST_URI'];
    if ($curentPage == PROOT || $curentPage == PROOT.'home/index'){
        $curentPage = 'HomeController';
    }
    return $curentPage;
}

function posted_values($post){
    $clean_ary = [];
    foreach ($post as $key=>$value){
        $clean_ary[$key] = sanitize($value);
    }
    return $clean_ary;
}