<?php

namespace Tests\Unit\Drivers;

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shipping\Models\Driver;
use GhaniniaIR\Shipping\Drivers\PishtazDriver;

class PishtazDriverTest extends TestCase
{

    protected $pishtazDriver ; 

    protected function setUp(): void
    {
        $this->pishtazDriver = new PishtazDriver ;
    }

    /** @test */
    public function driverPishtaz()
    {
        $pishtazDriver = $this->pishtazDriver->driver() ;

        $this->assertInstanceOf(Driver::class , $pishtazDriver );

        $this->assertEquals(
            $pishtazDriver->driver_class  , 
            "GhaniniaIR\Shipping\Drivers\PishtazDriver" 
        );
        
    }

}
