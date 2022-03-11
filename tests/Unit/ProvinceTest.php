<?php

use GhaniniaIR\Shipping\Core\Classes\Province;
use GhaniniaIR\Shipping\Core\Exceptions\NotMatchProvinceException;
use PHPUnit\Framework\TestCase;

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
}
