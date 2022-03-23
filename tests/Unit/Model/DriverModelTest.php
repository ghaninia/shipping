<?php

namespace Model;

use GhaniniaIR\Shipping\Models\Driver;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PHPUnit\Framework\TestCase;

class DriverModelTest extends TestCase
{
    /** @test */
    public function relationDriverByTariffs()
    {
        $model = (new Driver())->tariffs() ;
        $this->assertInstanceOf(HasMany::class , $model ) ;
    }
}