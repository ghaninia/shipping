<?php

namespace GhaniniaIR\Shipping;

use Illuminate\Support\ServiceProvider;
use GhaniniaIR\Shipping\PostageCalculator;
use GhaniniaIR\Shipping\Core\Interfaces\PostageInterface;

class ShippingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/database' => database_path(),
            __DIR__ . '/configs' => config_path(),
            __DIR__ . '/langs' => lang_path(),
        ], 'shipping');

        $this->app->instance(PostageInterface::class, new PostageCalculator());
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . "/configs/shipping.php",
            "shipping",
        );

        $this->loadTranslationsFrom(
            __DIR__ . "/langs",
            "shipping"
        );
    }
}
