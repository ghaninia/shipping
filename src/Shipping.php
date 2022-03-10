<?php

namespace GhaniniaIR\Shipping;

use GhaniniaIR\Shipping\Interfaces\ShippingDriverContract;

class Shipping
{
    protected ShippingDriverContract $driver;

    public function __construct($driver = null)
    {
        $this->driver = $driver ?? settings("default");
    }
}
