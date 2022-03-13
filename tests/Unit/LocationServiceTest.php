<?php

use GhaniniaIR\Shipping\Models\City;
use PHPUnit\Framework\TestCase;

class LocationServiceTest extends TestCase
{
    /**
     * @test
     */
    public function getLocationList()
    {
        $list = (new \GhaniniaIR\Shipping\Core\Services\LocationService())->list();

        $this->assertEquals($list->count(), 31);

        foreach ($list as $item) {
            $itemToArr = $item->toArray();
            $this->assertArrayHasKey("id", $itemToArr);
            $this->assertArrayHasKey("name", $itemToArr);
            $this->assertArrayHasKey("cities", $itemToArr);
        }
    }

    /** @test */
    public  function getStateListWithNighbours()
    {
        $list = (new \GhaniniaIR\Shipping\Core\Services\LocationService())->list(true);

        foreach ($list as $item) {
            $itemToArr = $item->toArray();
            $this->assertArrayHasKey("nighbours", $itemToArr);
        }
    }


    /** @test */
    public function provincesNeighbors()
    {
        $sourceState = \GhaniniaIR\Shipping\Models\State::query()->find(8);
        $destinationState = \GhaniniaIR\Shipping\Models\State::query()->find(27);

        $result = (new \GhaniniaIR\Shipping\Core\Services\LocationService())
            ->source($sourceState)
            ->destination($destinationState)
            ->provincesNeighbors();

        $this->assertTrue($result);
    }



    /** @test */
    public function wrongProvincesNeighbors()
    {
        $sourceState = \GhaniniaIR\Shipping\Models\State::query()->find(8);
        $destinationState = \GhaniniaIR\Shipping\Models\State::query()->find(1);

        $result = (new \GhaniniaIR\Shipping\Core\Services\LocationService())
            ->source($sourceState)
            ->destination($destinationState)
            ->provincesNeighbors();

        $this->assertFalse($result);
    }

    /** @test */
    public function fellowCitizenTogetherInCity()
    {
        $city = City::with("state")->first();

        $result = (new \GhaniniaIR\Shipping\Core\Services\LocationService())
            ->source($city->state, $city)
            ->destination($city->state, $city)
            ->fellowCitizenTogether();

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function wrongFellowCitizenTogetherInCity()
    {
        $sourceCity = City::with("state")->find(1);
        $destinationCity = City::with("state")->find(2);

        $result = (new \GhaniniaIR\Shipping\Core\Services\LocationService())
            ->source($sourceCity->state, $sourceCity)
            ->destination($destinationCity->state, $destinationCity)
            ->fellowCitizenTogether();

        $this->assertFalse($result);
    }
}
