<?php

namespace GhaniniaIR\Shipping\Core\Exceptions;

use Exception;

class NotMatchProvinceException extends Exception
{
    public function message()
    {
        return trans("shipping.exception.not_match_province");
    }
}
