<?php

namespace GhaniniaIR\Shipping\Core\Classes;
use GhaniniaIR\Shipping\ShippingSystem;

class Config
{
    private static $configs;

    private function __construct()
    {
    }

    /**
     *  get config instance 
     *  @return self 
     */
    public static function getInstance()
    {
        isset(self::$configs) ? static::$configs : static::$configs = require(ShippingSystem::$config);

        return new static();
    }

    /**
     * get config in file 
     * 
     * @param string $key 
     * @param string $default 
     * 
     * @return mixed 
     */
    public function get(string $key, mixed $default = null)
    {
        $keys = explode(".", $key);

        $result = array_reduce($keys, function($prev, $next){

            $prev = is_null($prev) ? static::$configs : $prev ;

            return $prev[$next] ?? null ;
        });

        return $result ?? $default ;
    }
}
