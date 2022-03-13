<?php

namespace GhaniniaIR\Shipping\Models;


use Illuminate\Database\Eloquent\Relations\Pivot;

class Nighbour extends Pivot
{
    protected $fillable = [
        "province_id" ,
        "to_province_id"
    ] ;
}
