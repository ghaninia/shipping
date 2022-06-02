<?php

use GhaniniaIR\Shipping\Core\Classes\Config;
use GhaniniaIR\Shipping\ShippingSystem;

ShippingSystem::reconnection([
    'driver' => 'sqlite',
    'database' => __DIR__."/database/database.sqlite",
    'foreign_key_constraints' => true,
    'strict' => true,
]);

ShippingSystem::reconfig(__DIR__ . "/configs/shipping.php");

if (function_exists("settings")) {
    /**
     * get config in sys
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function settings(string $key, mixed $default = null)
    {
        return Config::getInstance()->get($key, $default);
    }
}

if (!function_exists('dd')) {
    /**
     * @return string
     */
    function dd()
    {
        foreach (func_get_args() as $x) {
            var_dump($x);
        }
        die;
    }
}
