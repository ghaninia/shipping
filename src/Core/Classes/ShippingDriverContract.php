<?php

namespace GhaniniaIR\Shipping\Core\Classes;

use GhaniniaIR\Shipping\Core\Services\DriverService;
use GhaniniaIR\Shipping\Core\Services\TariffService;
use GhaniniaIR\Shipping\Core\Services\YearService;
use GhaniniaIR\Shipping\Models\Driver;
use GhaniniaIR\Shipping\Core\Services\LocationService;
use GhaniniaIR\Shipping\Models\TariffDetail;

abstract class ShippingDriverContract extends LocationService
{

    protected int $weight       = 0;
    protected int $length       = 0;
    protected int $width        = 0;
    protected int $height       = 0;
    protected int $cost         = 0;
    protected bool $cod         = false;

    /**
     * Calculate shipping price
     *
     * @return int
     */
    abstract public function calculate(): int;


    /**
     * Set the weight length
     * @param int $weight
     * 
     * @return self
     */
    protected function weight(int $weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * Set the shipment length
     * @param int $weight
     * 
     * @return self
     */
    protected function length(int $length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * Set the width of the shipment
     * @param int $weight
     * 
     * @return self
     */
    protected function width(int $width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Set the height of the shipment
     * @param int $weight
     * 
     * @return self
     */
    protected function height(int $height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Set the cost of the order
     * @param int $weight
     * 
     * @return self
     */
    protected function cost(int $cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * Payment on the spot
     * 
     * @return self
     */
    public function cod()
    {
        $this->cod = true;
        return $this;
    }

    /**
     * @return Driver
     */
    public function driver() : Driver
    {
        return (new DriverService())->get(__CLASS__) ;
    }

    /**
     * A tariff that matches our details
     * @return TariffDetail
     * @throws \Exception
     */
    public function tariffDetail() : TariffDetail
    {
        $result = (new TariffService(
            $this->driver() ,
            (new YearService())->current() ,
            $this->weight ,
            $this->situationStatesTogether() ,
            $this->sourceCity
        ))
        ->search();

        return is_null($result) ? throw new \Exception("Tariff is not supported!") : $result ;
    }
}
