<?php

namespace Bot\Titan\Singleton;


use GuzzleHttp\Client;

class ClientSingleton
{
    use Singleton;
    private static function createInstance()
    {
        $config = [
            'debug' => false,
            'cookies' => true,
            'verify' => false,
        ];
        return new Client($config);
    }
}