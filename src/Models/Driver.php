<?php

namespace GhaniniaIR\Shipping\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        "driver_class"
    ] ;

    public $timestamps = false ;

    public  function tariffs () {
        return $this->hasMany(Tariff::class) ;
    }

}
