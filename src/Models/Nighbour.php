<?php

namespace GhaniniaIR\Shipping\Models;

use GhaniniaIR\Shipping\Core\Enums\EnumShipping;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Nighbour extends Pivot
{

    protected $connection = EnumShipping::CONNECTION_NAME;
    
    protected $fillable = [
        "state_id",
        "to_state_id"
    ];

    public $timestamps = false;
}
