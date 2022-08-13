<?php

namespace GhaniniaIR\Shipping;

use Closure;
use GhaniniaIR\Shipping\Core\Classes\Config;

class PostageCalculator
{

    /**
     * re connection to database
     *
     * @param string $method
     * @param Closure|null $alternative
     * @return void
     */
    public static function reConnection(string $method, Closure $aftter = null)
    {

        $defaultConnectionName = ($method)("shipping.connection.default");

        $defaultConnectionDriver = ($method)(
            sprintf("shipping.connection.drivers.%s", $defaultConnectionName)
        ) ?? [];

        !is_null($aftter) ? $aftter($defaultConnectionDriver) : null;
    }

    /**
     * set config file location 
     * @param string $location
     * @return void
     */
    public static function setConfigLocation(string $location)
    {
        Config::setLocation($location);
    }
}
