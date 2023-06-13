<?php

namespace Bot\Titan\Singleton;

trait Singleton
{
    private static $instance;
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = self::createInstance();
        }
        return self::$instance;
    }
}