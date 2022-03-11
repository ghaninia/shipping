<?php

namespace GhaniniaIR\Shipping\Drivers;

use GhaniniaIR\Shipping\Core\Classes\ShippingDriverContract;
use GhaniniaIR\Shipping\Core\Interfaces\ShippingDriverInterface;

class SefarshiDriver extends ShippingDriverContract implements ShippingDriverInterface
{
    public function calculate(): int
    {
    }
}
