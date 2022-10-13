<?php

namespace GhaniniaIR\Shipping;

use Illuminate\Support\ServiceProvider;
use GhaniniaIR\Shipping\Core\Enums\EnumShipping;

class ShippingServiceProvider extends ServiceProvider
{

    public function boot(){

        $this->mergeConfigFrom(
            __DIR__ . '/configs/shipping.php' , "shipping"
        );
        /**
         * set connection database for shipping package
         */
        PostageCalculator::reConnection("config", function ($defaultConnectionDriver) {
            \Illuminate\Support\Facades\Config::set(
                sprintf("database.connections.%s", EnumShipping::CONNECTION_NAME),
                $defaultConnectionDriver
            );
        });
    }

    public function register()
    {
        /**
         * publish database , config , langs  files
         */
        $this->publishes([
            __DIR__ . '/database' => database_path(),
            __DIR__ . '/configs' => config_path(),
            __DIR__ . '/langs' => lang_path(),
        ], 'shipping');

        $this->publishes([
            __DIR__ . '/config/shipping.php' => config_path('shipping.php')
        ], 'config');
    }
}
