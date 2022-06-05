<?php

namespace GhaniniaIR\Shipping\Core\Classes;

use GhaniniaIR\Shipping\PostageCalculator;

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
        $key = PostageCalculator::$config;

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

            $prev = is_null($prev) ? static::$configs[PostageCalculator::$config] : $prev;

            return $prev[$next] ?? null;
        });

        return $result ?? $default;
    }
}
