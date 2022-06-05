<?php

namespace GhaniniaIR\Shipping\Models;

use Illuminate\Database\Eloquent\Model;
use GhaniniaIR\Shipping\Core\Enums\EnumShipping;

class State extends Model
{

    protected $connection = EnumShipping::CONNECTION_NAME ;
    
    protected $fillable = [
        "name"
    ];

    public $timestamps = false ;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function nighbours()
    {
        return $this->belongsToMany(
            State::class,
            "nighbours",
            "state_id",
            "to_state_id",
        )->using(Nighbour::class);
    }
}
