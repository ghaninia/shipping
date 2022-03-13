<?php

use PHPUnit\Framework\TestCase;

class LocationServiceTest extends TestCase
{
    /**
     * @test
     */
    public function getLocationList()
    {
        $list = (new \GhaniniaIR\Shipping\Core\Services\LocationService())->list() ;

        $this->assertEquals($list->count() , 31 ) ;
    }


}
