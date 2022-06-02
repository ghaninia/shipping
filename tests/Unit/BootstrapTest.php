<?php

namespace Tests\Unit;
use Illuminate\Database\Capsule\Manager as Capsule;

class BootstrapTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function connectionDatabase()
    {
        $databaseName = Capsule::connection()->getDatabaseName();
        $this->assertIsString($databaseName);
    }
}