<?php

namespace GhaniniaIR\Shipping\Core\Classes;

abstract class ShippingDriverContract
{

    protected int $weight       = 0;
    protected int $vat          = 0;
    protected int $tax          = 0;
    protected int $insurance    = 0;
    protected int $length       = 0;
    protected int $width        = 0;
    protected int $height       = 0;
    protected int $cost         = 0;
    protected bool $cod         = false;

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
     * @return bool
     */
    public function cod()
    {
        $this->cod = true;
        return $this;
    }



    /**
     * Calculate shipping price
     * 
     * @return int 
     */
    abstract public function calculate(): int;

    /**
     * @return string
     */
    abstract public function className() : string ;



}
