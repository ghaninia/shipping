<?php

namespace GhaniniaIR\Shipping\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    public $primaryKey = "id" ;

    protected $fillable = [
        "name"
    ] ;

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
            "nighbours"
        )->using(Nighbour::class);
    }
}
