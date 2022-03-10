<?php

use GhaniniaIR\Shipping\Classes\Config;

if (function_exists("settings")) {

    /**
     * get config in sys 
     * 
     * @param string $key
     * @param mixed $default
     * 
     * @return mixed 
     */
    function settings(string $key, mixed $default = null)
    {
        return Config::getInstance()->get($key, $default);
    }
}
