<?php

use GhaniniaIR\Shipping\PostageCalculator;
use GhaniniaIR\Shipping\Core\Classes\Config;
use GhaniniaIR\Shipping\Core\Enums\EnumShipping;
use Illuminate\Database\Capsule\Manager as Capsule;

if (! \Composer\InstalledVersions::isInstalled('laravel/framework')) {

    if (!function_exists("settings")) {
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

    PostageCalculator::setConfigLocation(__DIR__ . "/configs/shipping.php");

    PostageCalculator::reConnection("settings", function ($defaultConnectionDriver) {
        $capsule = new Capsule;
        $capsule->addConnection($defaultConnectionDriver, EnumShipping::CONNECTION_NAME);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    });
}
