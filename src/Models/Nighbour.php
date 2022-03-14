<?php

namespace GhaniniaIR\Shipping\Models;


use Illuminate\Database\Eloquent\Relations\Pivot;

class Nighbour extends Pivot
{
    protected $fillable = [
        "state_id" ,
        "to_state_id"
    ] ;

    public $timestamps = false ;

}
