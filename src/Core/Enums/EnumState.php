<?php

namespace GhaniniaIR\Shipping\Core\Enums;

use GhaniniaIR\Shipping\Core\Classes\EnumAbstract;

class EnumState extends EnumAbstract
{
    const InCity = "IN_CITY";
    const Neighbor = "NEIGHBOR";
    const InSide = "IN_SIDE";
    const Far = "FAR";
}
