<?php

namespace GhaniniaIR\Shipping;

use GhaniniaIR\Shipping\Core\Interfaces\ShippingDriverInterface;

class Shipping
{
    protected ShippingDriverInterface $driver;

    public function __construct($driver = null)
    {
        $this->driver = $driver ?? new (settings("default"));
    }
}
