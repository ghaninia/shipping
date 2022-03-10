<?php

namespace GhaniniaIR\Shipping\Core\Exceptions;

use Exception;

class NotFoundProvinceException extends Exception
{
    public function message()
    {
        return "The target province has not been found! Please enter the correct id .";
    }
}
