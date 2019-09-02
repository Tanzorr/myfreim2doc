<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 20.08.19
 * Time: 17:33
 */

function inputBlok($type, $label, $name, $value='', $inputAttrs=[], $divAttes=[]){
    $divString  = stringifyAttrs($divAttes);
    $inputString = stringifyAttrs($inputAttrs);
    $html='<div'. $divString. '>';
    $html.='<label for="'.$name.'">'.$label.'</label>';
    $html.='<input type="'.$type.'"id = "'.$name.'" name="'.$name.'" value="'.$value.'"'.$inputString.'/>';
    $html .='</div>';
    return $html;
}

function submitTag($buttonText, $inputAttrs=[]){
    $inputString= stringifyAttrs($inputAttrs);
    $html = '<input type="submit" value="'.$buttonText.'"'.$inputString.'/>';
    return $html;
}

function stringifyAttrs($attrs){
    $string = '';
    foreach ($attrs as $key=> $val){
        $string ='="'. $val.'"';
    }
    return $string;
}