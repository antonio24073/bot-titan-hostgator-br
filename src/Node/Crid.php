<?php
namespace Bot\Titan\Node;

class Crid
{
    public static function api(){
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        $config = include (__DIR__ . '/../../config/config.php');
        return file_get_contents($config->node_api_url, false, stream_context_create($arrContextOptions));
    }
    
    public static function cli(){
        return exec('/usr/bin/node ' . __DIR__ . '/crid.js');
    }
    
    public static function get(){
//         if(php_sapi_name() === 'cli'){
//             return Crid::cli();
//         }else{
//             return Crid::api();
//         }
        return Crid::php();
    }
    /**
     * Converts javascript function to php
     * @return string
     */
    public static function php(){
        //Math.random().toString(36).substring(2) + (new Date).getTime().toString(36)
        return substr(rand(), 0, 2).floor(microtime(time())*1000);
    }
}

