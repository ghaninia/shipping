<?php

namespace GhaniniaIR\Shipping\Core\Classes;

abstract class EnumAbstract
{

    /*
    ** تمام ثابت های داخل کلاس
    ** @return array
    */
    public static function all(): array
    {
        return self::reflaction();
    }

    /*
    ** تمام ثابت های کلاس فعلی را دریافت مینماییم
    ** @param string    $key
    ** @return array
    */
    protected static function reflaction(string $key = null): array
    {
        $consts = [];
        $reflect = new \ReflectionClass(new static);
        foreach ($reflect->getReflectionConstants() as $const) {
            if (is_null($key))
                $consts[] = $const->getValue();
            elseif (str_starts_with($const->getName(), $key))
                $consts[] = $const->getValue();
        }
        return $consts;
    }
}