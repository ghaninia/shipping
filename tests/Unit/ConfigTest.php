<?php

use PHPUnit\Framework\TestCase;
use Tests\Unit\stub\TestConfig;

final class ConfigTest extends TestCase
{
    /** @test */
    public function getConfigValueDeep1()
    {
        $result = TestConfig::getInstance()->get("name");
        $this->assertEquals($result, "shipping");
    }

    /** @test */
    public function getConfigWhenKeyNotExists()
    {
        $result = TestConfig::getInstance()->get("test");
        $this->assertNull($result);
    }

    /** @test */
    public function getDefaultValueWhenKeyNotExists()
    {
        $result = TestConfig::getInstance()->get("test", $default = "bigbang!");

        $this->assertEquals($result, $default);
    }

    /** @test */
    public function getConfigValueDeep3()
    {
        $result = TestConfig::getInstance()->get("x.y.z");
        $this->assertEquals($result, "bigbang!");
    }

    /** @test */
    public function getConfigValueDeep3NotExists()
    {
        $result = TestConfig::getInstance()->get("x.y.y");
        $this->assertNull($result);
    }
}
