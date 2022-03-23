<?php

namespace Model;

use GhaniniaIR\Shipping\Models\City;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Framework\TestCase;

class CityModelTest extends TestCase
{
    /** @test */
    public function relationCityByState()
    {
        $relation  = (new City())->state() ;
        $this->assertInstanceOf(BelongsTo::class , $relation );
    }
}