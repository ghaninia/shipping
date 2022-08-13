<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use GhaniniaIR\Shipping\Core\Classes\Config;

final class ConfigTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        Config::setLocation(
            __DIR__ . "/stub/configs/testfile.php"
        );
    }

    /** @test */
    public function getConfigValueDeep1()
    {
        $result = Config::getInstance()->get("name");
        $this->assertEquals($result, "shipping");
    }

    /** @test */
    public function getConfigWhenKeyNotExists()
    {
        $result = Config::getInstance()->get("test");
        $this->assertNull($result);
    }

    /** @test */
    public function getDefaultValueWhenKeyNotExists()
    {
        $result = Config::getInstance()->get("test", $default = "bigbang!");

        $this->assertEquals($result, $default);
    }

    /** @test */
    public function getConfigValueDeep3()
    {
        $result = Config::getInstance()->get("x.y.z");
        $this->assertEquals($result, "bigbang!");
    }

    /** @test */
    public function getConfigValueDeep3NotExists()
    {
        $result = Config::getInstance()->get("x.y.y");
        $this->assertNull($result);
    }
}
