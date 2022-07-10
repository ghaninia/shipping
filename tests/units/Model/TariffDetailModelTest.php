<?php

namespace Tests\Unit\Model;

use GhaniniaIR\Shipping\Models\TariffDetail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PHPUnit\Framework\TestCase;

class TariffDetailModelTest extends TestCase
{
    /** @test */
    public function relationTariffDetailByTariff()
    {
        $model = (new TariffDetail())->tariff() ;
        $this->assertInstanceOf(BelongsTo::class , $model ) ;
    }
}