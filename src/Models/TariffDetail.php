<?php

namespace GhaniniaIR\Shipping\Models;

use Illuminate\Database\Eloquent\Model;

class TariffDetail extends Model
{
    protected $fillable = [
        "tariff_id" ,
        "min_weight" ,
        "max_weight" ,
        "cost" ,
        "type" , // in : EnumState
        "is_provincial_capital"
    ] ;

    public $timestamps = false ;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tariff()
    {
        return $this->belongsTo(Tariff::class) ;
    }

}
