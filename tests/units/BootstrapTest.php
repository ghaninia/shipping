<?php

namespace Tests\Unit;

use GhaniniaIR\Shipping\PostageCalculator;
use GhaniniaIR\Shipping\Core\Enums\EnumShipping;
use Illuminate\Database\Capsule\Manager as Capsule;

class BootstrapTest extends \PHPUnit\Framework\TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function connectionDatabase()
    {
        $databaseName = Capsule::connection(EnumShipping::CONNECTION_NAME)->getDatabaseName();
        $this->assertIsString($databaseName);
    }

    /** @test */
    public function refreshDatabase()
    {
        $result = new PostageCalculator([
            'driver' => 'sqlite',
            'database' => $path = __DIR__ . "/stub/database/database.sqlite",
            'foreign_key_constraints' => true,
            'strict' => true,
        ]);
        $databaseName = Capsule::connection(EnumShipping::CONNECTION_NAME)->getDatabaseName();
        $this->assertIsString($databaseName);
        // $this->assertEquals($databaseName, $path);
    }
}
