<?php

namespace GhaniniaIR\Shipping\Models;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
        "year"
    ] ;

    public $timestamps = false ;

    public function tariffs() {
        return $this->hasMany(Tariff::class) ;
    }

}
