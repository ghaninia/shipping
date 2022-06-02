<?php

namespace Tests\Unit\Model;

use GhaniniaIR\Shipping\Models\Tariff;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PHPUnit\Framework\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TariffModelTest extends TestCase
{
    /** @test */
    public function relationTariffByDriver()
    {
        $model = (new Tariff())->driver() ;
        $this->assertInstanceOf(BelongsTo::class , $model ) ;
    }

    /** @test */
    public function relationTariffByDetails()
    {
        $model = (new Tariff())->details() ;
        $this->assertInstanceOf(HasMany::class , $model ) ;
    }
}