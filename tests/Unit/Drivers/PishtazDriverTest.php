<?php

namespace Tests\Unit\Drivers;

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shipping\Models\State;
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

    /** @test */
    public function calculatePishtazInSide()
    {
        $state = State::query()->with("cities")->first() ;
        $city = $state->cities->first();
        $pishtaz = (new PishtazDriver())
            ->source($state , $city)
            ->destination($state)
            ->weight(1)
            ->calculate();

        $this->assertEquals( $pishtaz , 81009 );
    }

}
