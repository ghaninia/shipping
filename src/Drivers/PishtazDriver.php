<?php

namespace GhaniniaIR\Shipping\Drivers;

use GhaniniaIR\Shipping\Core\Classes\ShippingDriverContract;
use GhaniniaIR\Shipping\Core\Interfaces\ShippingDriverInterface;

class PishtazDriver extends ShippingDriverContract implements ShippingDriverInterface
{
    final public function calculate(): int
    {
        $tariffDetail = $this->tariffDetail();
        $tariff = $tariffDetail->tariff;
        $result = $tariffDetail->cost;

        return $result;
    }
}
