<?php
namespace Bot\Titan\Utils;

class Convert
{
    public static function recursive_array_to_object($array) {
        return json_decode(json_encode($array, JSON_FORCE_OBJECT));
    } 
    public static function recursive_json_to_object($json){
        return Convert::recursive_array_to_object(json_decode($json));
    }
    public static function recursive_object_to_array($oject) {
        return json_decode(json_encode($oject), true);
    }
}

