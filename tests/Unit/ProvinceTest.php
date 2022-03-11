<?php

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shipping\Core\Classes\Province;
use GhaniniaIR\Shipping\Core\Enums\ProvinceStatus;
use GhaniniaIR\Shipping\Core\Exceptions\NotMatchProvinceException;

class ProvinceTest extends TestCase
{
    /** @test */
    public function findState()
    {
        foreach (range(1, 31) as $key) {
            $this->assertIsString((new Province)->find($key));
        }
    }

    /** 
     * @test 
     */
    public function noProvinceFound()
    {
        $this->expectException(NotMatchProvinceException::class);
        $result = (new Province)->find(32);
    }

    /**
     * @test
     */
    public function whenTwoProvincesAreEqual()
    {
        $result = (new Province)
            ->sourceState(1)
            ->destinationState(1)
            ->situationStatesTogether();

        $this->assertEquals($result, ProvinceStatus::InSide);
    }

    /**
     * @test 
     */
    public function whenTwoProvincesAreFar()
    {

        // nightbour 1  => [13, 31, 11, 10, 9], 

        $result = (new Province)
            ->sourceState(1)
            ->destinationState(2)
            ->situationStatesTogether();

        $this->assertEquals($result, ProvinceStatus::Far);
    }

    /**
     * @test
     */
    public function whenTwoProvincesAreNeighbors()
    {
        // nightbour 1  => [13, 31, 11, 10, 9], 
        $result = (new Province)
            ->sourceState(1)
            ->destinationState(13)
            ->situationStatesTogether();

        $this->assertEquals($result, ProvinceStatus::Neighbor);
    }

    /**
     * @test
     */
    public function areTheTwoProvincesNeighbors()
    {
        // nightbour 1  => [13, 31, 11, 10, 9], 
        $result = (new Province)
            ->sourceState(1)
            ->destinationState(13)
            ->provincesNeighbors();

        $this->assertTrue($result);
    }


    /**
     * @test
     */
    public function getListOfProvinces()
    {
        $result = (new Province)->list();

        $this->assertIsArray($result);
        $this->assertCount(31, $result);
    }
}
