<?php

namespace GhaniniaIR\Shipping\Models;

use Illuminate\Database\Eloquent\Model;
use GhaniniaIR\Shipping\Core\Enums\EnumShipping;

class Driver extends Model
{

    protected $connection = EnumShipping::CONNECTION_NAME ;
    
    protected $fillable = [
        "driver_class"
    ] ;

    public $timestamps = false ;

    public  function tariffs () {
        return $this->hasMany(Tariff::class) ;
    }

}
