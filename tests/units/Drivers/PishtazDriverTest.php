<?php

namespace Tests\Unit\Drivers;

use Mockery;
use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shipping\Models\State;
use GhaniniaIR\Shipping\Models\Driver;
use GhaniniaIR\Shipping\Drivers\PishtazDriver;

class PishtazDriverTest extends TestCase
{

    protected $pishtazDriver;

    protected function setUp(): void
    {
        $this->pishtazDriver = new PishtazDriver;
    }

    /** @test */
    public function driverPishtaz()
    {
        $pishtazDriver = $this->pishtazDriver->driver();

        $this->assertInstanceOf(Driver::class, $pishtazDriver);

        $this->assertEquals(
            $pishtazDriver->driver_class,
            "GhaniniaIR\Shipping\Drivers\PishtazDriver"
        );
    }

    /** @test */
    public function calculatePishtazInSide()
    {
        $state = State::query()->with("cities")->first();
        $city = $state->cities->first();
        $pishtaz = (new PishtazDriver())
            ->source($state, $city)
            ->destination($state)
            ->weight(1)
            ->calculate();

        $this->assertEquals($pishtaz, 81009);
    }

    /** @test */
    public function mockCalculatePishtazInSide()
    {
        // $mock = Mockery::mock(PishtazDriver::class)
        //     ->shouldReceive('tariffDetail')
        //     ->once()
        //     ->andReturn(
        //         (object) [
        //             'tariff' => (object) [
        //                 'code' => 81009,
        //                 'vat' => 0,
        //                 'tax' => 0,
        //                 'registration_fee' => 0,
        //                 'right_headquarters' => 0,
        //                 'insurance' => 0,
        //                 'max_weight' => null,
        //                 'min_weight' => 0,
        //             ],
        //             'max_weight' => null,
        //             'min_weight' => 0,
        //             'base_price' => 81009,
        //             'over_per_kg_price' => 0,
        //         ]
        //     );

    }
}
