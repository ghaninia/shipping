<?php

namespace GhaniniaIR\Shipping\Models;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $fillable = [
        "driver_id" ,
        "year_id" ,
        "cod" ,
        "vat" ,
        "tax" ,
        "registration_fee" ,
        "right_headquarters" ,
        "insurance" ,
        "intra_city_commission" ,
        "suburban_commission" ,
        "min_weight" ,
        "max_weight" ,
    ] ;

    public $timestamps = false ;

    public function driver() {
        return $this->belongsTo(Driver::class ) ;
    }

    public  function year() {
        return $this->belongsTo( Year::class ) ;
    }

}
