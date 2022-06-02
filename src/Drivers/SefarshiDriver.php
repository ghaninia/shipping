<?php

namespace GhaniniaIR\Shipping\Drivers;

use GhaniniaIR\Shipping\Core\Classes\ShippingDriverContract;
use GhaniniaIR\Shipping\Core\Exceptions\NotMatchProvinceException;
use GhaniniaIR\Shipping\Core\Interfaces\ShippingDriverInterface;

class SefarshiDriver extends ShippingDriverContract implements ShippingDriverInterface
{
    public function calculate(): int
    {
        $tariffDetail = $this->tariffDetail();
        $tariff = $tariffDetail->tariff;

        if(
            !! $tariff->max_weight &&
            !! $tariff->min_weight &&
            !($tariff->max_weight >= $this->weight) &&
            !($tariff->min_weight <= $this->weight)
        ){
            throw new NotMatchProvinceException("Tariff is not supported! Because the amount of weight is not supported.") ;
        }

        $total  = $tariff->code ;
        $total += $tariff->vat ;
        $total += $tariff->tax ;
        $total += $tariff->registration_fee ;
        $total += $tariff->right_headquarters ;
        $total += $tariff->insurance ;

        if(is_null($tariffDetail->max_weight))
        {
            $overweight = $this->weight - $tariffDetail->min_weight ;
            $overweight /= 1000 ;
            $overweight = ceil($overweight) ;
            $total = ($overweight * $tariffDetail->over_per_kg_price) + $tariffDetail->base_price ;
        }else{
            $total += $tariffDetail->base_price ;
        }

        return $total;
    }
}
