<?php

namespace GhaniniaIR\Shipping\Drivers;

use GhaniniaIR\Shipping\Core\Classes\ShippingDriverContract;
use GhaniniaIR\Shipping\Core\Interfaces\ShippingDriverInterface;

class TipaxDriver extends ShippingDriverContract implements ShippingDriverInterface
{
    public function calculate(): int
    {
    }
}
