<?php
namespace Bot\Titan\Utils;

class Validate
{

    public static function api_json($json_struture, $json)
    {
        return Extract::unique_object_keys($json_struture) == Extract::unique_object_keys($json);
    }
}



