<?php

namespace GhaniniaIR\Shipping\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function nightbours()
    {
        return $this->belongsToMany(
            State::class,
            "nightbours"
        );
    }
}
