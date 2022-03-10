<?php

namespace GhaniniaIR\Shipping\Classes;

class Config
{
    public const CONFIG_PATH = __DIR__ . "/../configs/shipping.php";

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
        isset(self::$configs) ? static::$configs : static::$configs = require(static::CONFIG_PATH);

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
