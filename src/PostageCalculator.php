<?php

namespace GhaniniaIR\Shipping;

use GhaniniaIR\Shipping\Core\Enums\EnumShipping;
use Illuminate\Database\Capsule\Manager as Capsule;
use GhaniniaIR\Shipping\Core\Interfaces\PostageInterface;

class PostageCalculator implements PostageInterface
{
    /**
     * @param array $connection
     * @return void
     */
    public function __construct($connection = [])
    {
        $defaultConnectionName = config("shipping.connection.default");
        $defaultConnectionDriver = config(
            sprintf("shipping.connection.drivers.%s", $defaultConnectionName)
        ) ?? [];
        $capsule = new Capsule;
        $capsule->addConnection($defaultConnectionDriver, EnumShipping::CONNECTION_NAME);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
