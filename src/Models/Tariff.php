<?php

namespace GhaniniaIR\Shipping\Models;

use GhaniniaIR\Shipping\Core\Enums\EnumShipping;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    
    protected $connection = EnumShipping::CONNECTION_NAME ;
    
    protected $fillable = [
        "driver_id" ,
        "cod" , ### On-site delivery cost
        "vat" , ### Added value
        "tax" , ### Taxation
        "registration_fee" ,
        "right_headquarters" , 
        "insurance" ,
        "intra_city_commission" ,
        "suburban_commission" , 
        "min_weight" , 
        "max_weight" , 
    ] ;

    public $timestamps = false ;

    protected $casts = [
        "is_provincial_capital" => "boolean"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver() {
        return $this->belongsTo(Driver::class ) ;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details() {
        return $this->hasMany(
            TariffDetail::class
        );
    }

}
