<?php

namespace GhaniniaIR\Shipping\Core\Services;

use GhaniniaIR\Shipping\Models\Driver;

class DriverService
{
    /**
     *
     * @param string $driverClass
     * @return Driver
     */
    public function get( string $driverClass) : Driver
    {
        return Driver::firstOrCreate([
            "driver_class" => $driverClass
        ]);
    }
}