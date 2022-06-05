<?php

namespace GhaniniaIR\Shipping\Models;

use GhaniniaIR\Shipping\Core\Enums\EnumShipping;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $connection = EnumShipping::CONNECTION_NAME ;
    
    protected $fillable = [
        "name" ,
        "is_provincial_capital" ,
        "state_id" ,
    ] ;

    protected $casts = [
        "is_provincial_capital" => "boolean"
    ];

    public $timestamps = false ;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
