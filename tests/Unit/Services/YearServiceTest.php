<?php

namespace Services;

use GhaniniaIR\Shipping\Core\Services\YearService;
use PHPUnit\Framework\TestCase;

class YearServiceTest extends TestCase
{
    /** @test */
    public function getCurrentYear()
    {
        $yearService = (new YearService()) ;

        $currentYear = $yearService->currentYear;

        $currentInstance = $yearService->current() ;

        $this->assertEquals($currentYear , $currentInstance->year) ;

    }
}