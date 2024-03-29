<?php

namespace GhaniniaIR\Shipping\Drivers;

use GhaniniaIR\Shipping\Core\Classes\ShippingDriverContract;
use GhaniniaIR\Shipping\Core\Interfaces\ShippingDriverInterface;
use GhaniniaIR\Shipping\Core\Exceptions\TariffNotSupportException;

class PishtazDriver extends ShippingDriverContract implements ShippingDriverInterface
{
    final public function calculate(): int
    {
        $tariffDetail = $this->tariffDetail();

        $tariff = $tariffDetail->tariff;

        if (!is_null($tariff->max_weight) && !($tariff->max_weight >= $this->weight)) {
            throw new TariffNotSupportException(
                trans("shipping.exception.tariff_not_found.maximum_weight", $tariff->max_weight)
            );
        }

        if (!is_null($tariff->min_weight) && !($tariff->min_weight < $this->weight)) {
            throw new TariffNotSupportException(
                trans("shipping.exception.tariff_not_found.minimum_weight", $tariff->min_weight)
            );
        }

        $total  = $tariff->code;
        $total += $tariff->vat;
        $total += $tariff->tax;
        $total += $tariff->registration_fee;
        $total += $tariff->right_headquarters;
        $total += $tariff->insurance;

        if (is_null($tariffDetail->max_weight)) {
            $overweight = $this->weight - $tariffDetail->min_weight;
            $overweight /= 1000;
            $overweight = ceil($overweight);
            $total = ($overweight * $tariffDetail->over_per_kg_price) + $tariffDetail->base_price;
        } else {
            $total += $tariffDetail->base_price;
        }

        return $total;
    }
}
