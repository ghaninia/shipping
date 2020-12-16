<?php
namespace GhaniniaIR\Shipping ;
use Illuminate\Support\ServiceProvider;
class ShippingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/shipping.php', 'shipping'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/shipping.php' => config_path('shipping.php')
        ], 'config');
    }
}
