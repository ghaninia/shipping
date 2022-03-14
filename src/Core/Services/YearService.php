<?php

namespace GhaniniaIR\Shipping\Core\Services;

use GhaniniaIR\Shipping\Models\Year;

class YearService
{
    public function current() : int {
        return verta()->year ;
    }

    /**
     * create or new year
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function firstOrCreate()
    {
        return Year::query()->firstOrCreate([
            "year" => $this->current()
        ]) ;
    }
}