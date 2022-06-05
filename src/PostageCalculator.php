<?php

namespace GhaniniaIR\Shipping;

use GhaniniaIR\Shipping\Core\Enums\EnumShipping;
use Illuminate\Database\Capsule\Manager as Capsule;
use GhaniniaIR\Shipping\Core\Interfaces\PostageInterface;

class PostageCalculator implements PostageInterface
{
    public static string $config;

    /**
     * @param array $connection
     * @return void
     */
    public function __construct()
    {

        $method = function_exists("config") && function_exists("app") ? "config" : "settings";

        $defaultConnectionName = ($method)("shipping.connection.default");
        $defaultConnectionDriver = ($method)(
            sprintf("shipping.connection.drivers.%s", $defaultConnectionName)
        ) ?? [];

        $capsule = new Capsule;
        $capsule->addConnection($defaultConnectionDriver, EnumShipping::CONNECTION_NAME);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    /**
     * @param string $config
     * @return void
     */
    public static function reconfig(string $config)
    {
        self::$config = $config;
    }
}
