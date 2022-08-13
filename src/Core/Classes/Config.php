<?php

namespace GhaniniaIR\Shipping\Core\Classes;

class Config
{
    private static $configs;

    private static $location;

    private function __construct()
    {
    }

    /**
     *  get config instance
     *  @return self
     */
    public static function getInstance()
    {
        $key = self::$location;

        isset(self::$configs[$key]) ?: static::$configs[$key] = require($key);

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

        $result = array_reduce($keys, function ($prev, $next) {

            $prev = is_null($prev) ? static::$configs[self::$location] : $prev;

            return $prev[$next] ?? null;
        });

        return $result ?? $default;
    }

    /**
     * set config in file
     *
     * @param string $key
     *
     * @return void
     */
    public static function setLocation(string $location)
    {
        static::$location = $location;
    }
}
