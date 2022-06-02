<?php

namespace GhaniniaIR\Shipping;

use Illuminate\Database\Capsule\Manager as Capsule;

class ShippingSystem
{
    public static string $config ;
    public static array $connection ;

    /**
     * @return void
     */
    public static function reconnection(array $connection)
    {
        self::$connection = $connection ;
        $capsule = new Capsule;
        $capsule->addConnection($connection);
        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();
        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
    }

    /**
     * @param string $config
     * @return void
     */
    public static function reconfig(string $config)
    {
        if ( file_exists($config)) {
            self::$config = $config ;
        }
    }
}
