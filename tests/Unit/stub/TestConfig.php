<?php

namespace Tests\Unit\stub;

use GhaniniaIR\Shipping\Core\Classes\Config as OriginalConfig;

class TestConfig extends OriginalConfig
{
    public const CONFIG_PATH = __DIR__ . "/configs/testfile.php";
}